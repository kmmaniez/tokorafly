<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = [
        'id_barang',
        'nama_bgudang',
        'warna',
        'ukuran',
        'stok',
        'tgl_keluar'
    ];

}
