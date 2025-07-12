<?php

namespace App\Controllers;

use App\Models\ExpenseModel;
use App\Models\CategoryModel;

class Expenses extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $expenseModel = new ExpenseModel();
        $categoryModel = new CategoryModel();

        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        $builder = $expenseModel
            ->select('expenses.*, categories.nama_kategori')
            ->join('categories', 'categories.id = expenses.kategori_id')
            ->where('expenses.user_id', session()->get('user_id'))
            ->orderBy('expenses.tanggal', 'DESC');

        if ($bulan && $tahun) {
            $builder->where('MONTH(tanggal)', $bulan)
                ->where('YEAR(tanggal)', $tahun);
        }

        $data['expenses'] = $builder->findAll();
        $data['categories'] = $categoryModel
            ->where('user_id', session()->get('user_id'))
            ->findAll();

        // Total pengeluaran bulan itu
        $data['total'] = $expenseModel
            ->where('user_id', session()->get('user_id'))
            ->where('MONTH(tanggal)', $bulan)
            ->where('YEAR(tanggal)', $tahun)
            ->selectSum('nominal')
            ->get()
            ->getRow()
            ->nominal ?? 0;

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        return view('expenses/index', $data);
    }

    // Controller Add
    public function add()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $expenseModel = new ExpenseModel();

        $expenseModel->insert([
            'user_id'         => session()->get('user_id'),
            'kategori_id'     => $this->request->getPost('kategori_id'),
            'nama_pengeluaran' => $this->request->getPost('nama_pengeluaran'),
            'nominal'         => $this->request->getPost('nominal'),
            'tanggal'         => $this->request->getPost('tanggal'),
            'catatan'         => $this->request->getPost('catatan')
        ]);

        return redirect()->to('/expenses');
    }

    // Controller Chart
    public function chart()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $expenseModel = new ExpenseModel();

        // Ambil total pengeluaran per bulan untuk tahun ini
        $query = $expenseModel
            ->select('MONTH(tanggal) as bulan, SUM(nominal) as total')
            ->where('user_id', session()->get('user_id'))
            ->where('YEAR(tanggal)', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan', 'ASC')
            ->get();

        $data['grafik'] = $query->getResultArray();

        return view('expenses/chart', $data);
    }

    public function exportExcel()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $expenseModel = new ExpenseModel();

        $expenses = $expenseModel
            ->select('expenses.*, categories.nama_kategori')
            ->join('categories', 'categories.id = expenses.kategori_id')
            ->where('expenses.user_id', session()->get('user_id'))
            ->orderBy('expenses.tanggal', 'DESC')
            ->findAll();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="pengeluaran.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Tanggal', 'Nama', 'Kategori', 'Nominal', 'Catatan']);

        foreach ($expenses as $row) {
            fputcsv($output, [
                $row['tanggal'],
                $row['nama_pengeluaran'],
                $row['nama_kategori'],
                $row['nominal'],
                $row['catatan']
            ]);
        }

        fclose($output);
        exit;
    }

    public function exportPDF()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        require_once APPPATH . 'Libraries/dompdf/autoload.inc.php';
        $dompdf = new \Dompdf\Dompdf();

        $expenseModel = new ExpenseModel();

        $expenses = $expenseModel
            ->select('expenses.*, categories.nama_kategori')
            ->join('categories', 'categories.id = expenses.kategori_id')
            ->where('expenses.user_id', session()->get('user_id'))
            ->orderBy('expenses.tanggal', 'DESC')
            ->findAll();

        $html = '<h3>Data Pengeluaran</h3><table border="1" cellpadding="5" cellspacing="0" width="100%"><tr><th>Tanggal</th><th>Nama</th><th>Kategori</th><th>Nominal</th><th>Catatan</th></tr>';

        foreach ($expenses as $row) {
            $html .= "<tr>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['nama_pengeluaran']}</td>
                    <td>{$row['nama_kategori']}</td>
                    <td>Rp " . number_format($row['nominal'], 0, ',', '.') . "</td>
                    <td>{$row['catatan']}</td>
                  </tr>";
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('pengeluaran.pdf', ['Attachment' => 1]);
    }

    public function create()
    {
        $categoriesModel = new CategoryModel();
        $data['categories'] = $categoriesModel->where('user_id', session()->get('user_id'))->findAll();

        return view('expenses/create', $data);
    }

    public function store()
    {
        $model = new \App\Models\ExpenseModel();

        $data = [
            'user_id'           => session('user_id'),
            'kategori_id'       => $this->request->getPost('kategori_id'),
            'nama_pengeluaran'  => $this->request->getPost('nama'),
            'nominal'           => $this->request->getPost('nominal'),
            'tanggal'           => $this->request->getPost('tanggal'),
            'catatan'           => $this->request->getPost('catatan'),
        ];

        if (empty($data['nama_pengeluaran']) || empty($data['kategori_id']) || empty($data['nominal']) || empty($data['tanggal'])) {
            return redirect()->back()->with('error', 'Semua field wajib diisi');
        }

        $model->insert($data);

        return redirect()->to('/expenses')->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new \App\Models\ExpenseModel();
        $expense = $model->find($id);

        if (!$expense || $expense['user_id'] != session('user_id')) {
            return redirect()->to('/expenses')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'kategori_id'       => $this->request->getPost('kategori_id'),
            'nama_pengeluaran'  => $this->request->getPost('nama'),
            'nominal'           => $this->request->getPost('nominal'),
            'tanggal'           => $this->request->getPost('tanggal'),
            'catatan'           => $this->request->getPost('catatan'),
        ];

        if (empty($data['nama_pengeluaran']) || empty($data['kategori_id']) || empty($data['nominal']) || empty($data['tanggal'])) {
            return redirect()->back()->with('error', 'Semua field wajib diisi');
        }

        $model->update($id, $data);

        return redirect()->to('/expenses')->with('success', 'Pengeluaran berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new \App\Models\ExpenseModel();
        $expense = $model->find($id);

        if (!$expense || $expense['user_id'] != session('user_id')) {
            return redirect()->to('/expenses')->with('error', 'Data tidak ditemukan');
        }

        $model->delete($id);

        return redirect()->to('/expenses')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
