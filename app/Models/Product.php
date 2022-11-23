<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'warna',
        'ukuran',
        'stok',
    ];

    // RELASI PRODUK KE BARANG MASUK & KELUAR
    // public function barangmasuk()
    // {
    //     return $this->hasMany(BarangMasuk::class, 'id_barang');
    // }
    // public function barangkeluar()
    // {
    //     return $this->hasMany(barangkeluar::class, 'id_barang');
    // }

}
