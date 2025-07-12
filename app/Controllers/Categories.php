<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Categories extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $model = new CategoryModel();

        $data['categories'] = $model
            ->where('user_id', session()->get('user_id'))
            ->findAll();

        return view('categories/index', $data);
    }

    public function create()
    {
        return view('categories/form', [
            'title'  => 'Tambah Kategori',
            'action' => base_url('/categories/store'),
        ]);
    }

    public function store()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $model = new CategoryModel();

        $nama = $this->request->getPost('nama_kategori');
        $userId = session('user_id');

        if (empty($nama)) {
            return redirect()->back()->with('error', 'Nama kategori wajib diisi')->withInput();
        }

        $model->insert([
            'nama_kategori' => $nama,
            'user_id'       => $userId
        ]);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $model = new CategoryModel();
        $kategori = $model->find($id);

        if (!$kategori || $kategori['user_id'] != session('user_id')) {
            return redirect()->to('/categories')->with('error', 'Kategori tidak ditemukan');
        }

        return view('categories/form', [
            'title'    => 'Edit Kategori',
            'action'   => base_url('/categories/update/' . $id),
            'kategori' => $kategori
        ]);
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $model = new CategoryModel();
        $kategori = $model->find($id);

        if (!$kategori || $kategori['user_id'] != session('user_id')) {
            return redirect()->to('/categories')->with('error', 'Kategori tidak ditemukan');
        }

        $nama = $this->request->getPost('nama_kategori');

        if (empty($nama)) {
            return redirect()->back()->with('error', 'Nama kategori wajib diisi')->withInput();
        }

        $model->update($id, ['nama_kategori' => $nama]);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil diperbarui');
    }

    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        $model = new CategoryModel();
        $kategori = $model->find($id);

        if (!$kategori || $kategori['user_id'] != session('user_id')) {
            return redirect()->to('/categories')->with('error', 'Kategori tidak ditemukan');
        }

        $model->delete($id);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil dihapus');
    }
}
