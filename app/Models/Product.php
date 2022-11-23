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
    public function nama()
    {
        return $this->hasMany(BarangMasuk::class);
    }

}
