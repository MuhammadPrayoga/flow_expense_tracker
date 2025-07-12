<?php

namespace App\Controllers;

use App\Models\ExpenseModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $expenseModel = new ExpenseModel();
        $categoryModel = new CategoryModel();

        $userId = session()->get('user_id');

        // Total pengeluaran bulan ini
        $totalBulanIni = $expenseModel
            ->where('user_id', $userId)
            ->where('MONTH(tanggal)', date('m'))
            ->where('YEAR(tanggal)', date('Y'))
            ->selectSum('nominal')
            ->first()['nominal'] ?? 0;

        // Total transaksi
        $totalTransaksi = $expenseModel->where('user_id', $userId)->countAllResults();

        // Total kategori
        $totalKategori = $categoryModel->where('user_id', $userId)->countAllResults();

        // Data untuk grafik
        $builder = $expenseModel
            ->select("MONTH(tanggal) AS bulan, SUM(nominal) AS total")
            ->where('user_id', $userId)
            ->groupBy("MONTH(tanggal)")
            ->orderBy("bulan")
            ->findAll();

        $bulan = [];
        $totalPerBulan = [];

        foreach ($builder as $row) {
            $bulan[] = date('M', mktime(0, 0, 0, $row['bulan'], 10));
            $totalPerBulan[] = $row['total'];
        }

        return view('dashboard', [
            'totalBulanIni' => $totalBulanIni,
            'totalTransaksi' => $totalTransaksi,
            'totalKategori' => $totalKategori,
            'bulan' => $bulan,
            'totalPerBulan' => $totalPerBulan
        ]);
    }
}
