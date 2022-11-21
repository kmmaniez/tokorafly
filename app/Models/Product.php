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
    public function brgmasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
    
    public function brgkeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    // RELASI PRODUK KE LAPORAN MASUK & KELUAR
    public function lapmasuk()
    {
        return $this->hasMany(LaporanMasuk::class);
    }
    
    public function lapkeluar()
    {
        return $this->hasMany(LaporanKeluar::class);
    }
}
