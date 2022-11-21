<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = [
        'id_barang',
        'nama_supplier',
        'warna',
        'ukuran',
        'stok',
        'tgl_masuk'
    ];

    public function res_brgmasuk()
    {
        return $this->belongsTo(BarangMasuk::class, 'id_barang');
    }
}
