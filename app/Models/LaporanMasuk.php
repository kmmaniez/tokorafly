<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasuk extends Model
{
    use HasFactory;
    protected $table = 'laporan_masuk';
    protected $fillable = [
        'id_barang',
        'nama_supplier',
        'warna',
        'ukuran',
        'stok',
    ];
    
    public function res_lapmasuk()
    {
        return $this->belongsTo(LaporanMasuk::class, 'id_barang');
    }
}
