<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeluar extends Model
{
    use HasFactory;
    protected $table = 'laporan_keluar';
    protected $fillable = [
        'id_barang',
        'nama_bgudang',
        'warna',
        'ukuran',
        'stok',
    ];

    public function res_lapkeluar()
    {
        return $this->belongsTo(LaporanKeluar::class, 'id_barang');
    }
}
