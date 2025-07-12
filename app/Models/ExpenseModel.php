<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpenseModel extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'kategori_id', 'nama_pengeluaran', 'nominal', 'tanggal', 'catatan'];
}
