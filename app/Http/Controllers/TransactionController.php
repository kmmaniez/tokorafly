<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class TransactionController extends Controller
{
    // TRANSACTION CONTROLLER = CONTROLLER UNTUK BARANG MASUK & KELUAR

    // METHOD VIEW TABLE DATA BARANG MASUK & KELUAR 
    public function index()
    {
        // dd(BarangMasuk::all());
        return view('admin.barang-masuk.index',[
            'title'         => 'Data Stok Barang Masuk',
            'barangmasuk'   => BarangMasuk::all()
        ]);
    }

    public function index_brg_keluar()
    {
        return view('admin.barang-keluar.index',[
            'title'         => 'Data Stok Barang Keluar',
            'barangkeluar'  => BarangKeluar::all()
        ]);
    }

    

    // METHOD VIEW TAMBAH DATA BARANG MASUK & KELUAR
    public function create()
    {
        return view('admin.barang-masuk.create-brg-masuk', [
            'title'     => 'Tambah Barang Masuk',
            'products'  => Product::all()
        ]);
    }

    public function create_brg_keluar()
    {
        return view('admin.barang-keluar.create-brg-keluar', [
            'title'     => 'Tambah Barang Keluar',
            'products'  => Product::all()
        ]);
    }

    

    // METHOD SIMPAN DATA BARANG MASUK & KELUAR
    public function store(Request $request)
    {
        // dd($request->toArray());
        BarangMasuk::create([
            'nama_supplier' => $request->input('nama_supplier'),
            'id_barang'     => $request->input('id_barang'),
            'warna'         => $request->input('warna'),
            'ukuran'        => $request->input('ukuran'),
            'stok'          => $request->input('stok'),
            'tgl_masuk'     => $request->input('tgl_masuk')    
        ]);
        return redirect('/barang-masuk');
    }

    public function store_brg_keluar(Request $request)
    {
        // dd($request->toArray());
        BarangKeluar::create([
            'nama_bgudang'  => $request->input('nama_bgudang'),
            'id_barang'     => $request->input('id_barang'),
            'warna'         => $request->input('warna'),
            'ukuran'        => $request->input('ukuran'),
            'stok'          => $request->input('stok'),
            'tgl_keluar'    => $request->input('tgl_keluar')
        ]);
        return redirect('/barang-keluar');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $transaction)
    {
        //
    }



    // METHOD VIEW DATA LAPORAN MASUK & KELUAR
    public function edit(BarangMasuk $barangmasuk)
    {
        //
    }

    public function edit_brg_keluar(BarangKeluar $barangkeluar)
    {
        //
    }



    // METHOD UPDATE DATA BARANG MASUK & KELUAR
    public function update(Request $request, BarangMasuk $barangmasuk)
    {
        dd($request->toArray());
    }

    public function update_brg_keluar(Request $request, BarangKeluar $barangkeluar)
    {
        dd($request->toArray());
    }


    
    // METHOD HAPUS DATA BARANG MASUK & KELUAR
    public function destroy(BarangMasuk $barangmasuk)
    {
        BarangMasuk::destroy($barangmasuk->id);
        return redirect('/barang-masuk');
    }

    public function destroy_brg_keluar(BarangKeluar $barangkeluar)
    {
        BarangKeluar::destroy($barangkeluar->id);
        return redirect('/barang-keluar');
    }
}
