<?php

namespace App\Http\Controllers;

use App\Models\LaporanMasuk;
use App\Models\LaporanKeluar;
use App\Models\Product;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // LAPORAN CONTROLLER = CONTROLLER UNTUK LAPORAN MASUK & KELUAR

    // METHOD VIEW TABLE DATA LAPORAN MASUK & KELUAR 
    public function index()
    {
        return view('admin.laporan-masuk.index', [
            'title'     => 'Laporan Barang Masuk',
            'lapmasuk'  => LaporanMasuk::all()
        ]);
    }

    public function index_brg_keluar()
    {
        return view('admin.laporan-keluar.index',[
            'title'     => 'Laporan Barang Keluar',
            'lapkeluar' => LaporanKeluar::all()
        ]);
    }



    // METHOD VIEW TAMBAH DATA LAPORAN MASUK & KELUAR
    public function create()
    {
        return view('admin.laporan-masuk.create-laporan',[
            'title'     => 'Laporan Barang Masuk',
            'products'  => Product::all()
        ]);
    }

    public function create_brg_keluar()
    {
        return view('admin.laporan-keluar.create-laporan',[
            'title'     => 'Laporan Barang Keluar',
            'products'  => Product::all()
        ]);
    }



    // METHOD SIMPAN DATA LAPORAN MASUK & KELUAR
    public function store(Request $request)
    {
        // dd($request->toArray());
        LaporanMasuk::create([
            'nama_supplier' => $request->input('nama_supplier'),
            'id_barang'     => $request->input('id_barang'),
            'warna'         => $request->input('warna'),
            'ukuran'        => $request->input('ukuran'),
            'stok'          => $request->input('stok')  
        ]);
        return redirect('/laporan-masuk');
    }

    public function store_brg_keluar(Request $request)
    {
        // dd($request->toArray());
        LaporanKeluar::create([
            'nama_bgudang'  => $request->input('nama_bgudang'),
            'id_barang'     => $request->input('id_barang'),
            'warna'         => $request->input('warna'),
            'ukuran'        => $request->input('ukuran'),
            'stok'          => $request->input('stok')  
        ]);
        return redirect('/laporan-keluar');
    }


    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanMasuk $laporan)
    {
        //
    }


    
    // METHOD VIEW DATA LAPORAN MASUK & KELUAR
    public function edit(LaporanMasuk $laporanmasuk)
    {
        //
    }

    public function edit_lap_keluar(LaporanKeluar $laporankeluar)
    {
        //
    }



    // METHOD UPDATE DATA LAPORAN MASUK & KELUAR
    public function update(Request $request, LaporanMasuk $laporanmasuk)
    {
        dd($request->toArray());
    }

    public function update_lap_keluar(Request $request, LaporanKeluar $laporankeluar)
    {
        dd($request->toArray());
    }



    // METHOD HAPUS DATA LAPORAN MASUK & KELUAR
    public function destroy(LaporanMasuk $laporanmasuk)
    {
        LaporanMasuk::destroy($laporanmasuk->id);
        return redirect('/barang-masuk');
    }

    public function destroy_lap_keluar(LaporanKeluar $laporankeluar)
    {
        LaporanKeluar::destroy($laporankeluar->id);
        return redirect('/barang-masuk');
    }
}
