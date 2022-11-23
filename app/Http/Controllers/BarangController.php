<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Product;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function index() // VIEW TABLE BARANG MASUK
    {
        // $brg = BarangMasuk::find(7);
        // echo $brg->product->nama_produk;
        // dd($brg);
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

    
    public function create() // VIEW CREATE BARANG MASUK
    {
        $this->authorize('tambah barang');
        
        return view('admin.barang-masuk.create-brg-masuk', [
            'title'     => 'Tambah Barang Masuk',
            'products'  => Product::all()
        ]);
    }

    public function create_brg_keluar()
    {
        $this->authorize('tambah barang');
        
        return view('admin.barang-keluar.create-brg-keluar', [
            'title'     => 'Tambah Barang Keluar',
            'products'  => Product::all()
        ]);
    }

    
    public function store(Request $request) // SIMPAN BARANG MASUK
    {
        $this->authorize('tambah barang');

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
        $this->authorize('tambah barang');

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

    
    // public function show($id)
    // {
    //     //
    // }

    
    public function edit(BarangMasuk $barang_masuk) // VIEW EDIT BARANG MASUK
    {
        $this->authorize('tambah barang');
        
        return view('admin.barang-masuk.edit-brg-masuk', [
            'title'     => 'Edit Barang Masuk',
            'brgmasuk'  => $barang_masuk,
            'products'  => Product::all()
        ]);
    }

    public function edit_brg_keluar(BarangKeluar $barang_keluar)
    {
        $this->authorize('tambah barang');
        
        return view('admin.barang-keluar.edit-brg-keluar', [
            'title'     => 'Edit Barang Keluar',
            'brgkeluar' => $barang_keluar,
            'products'  => Product::all()
        ]);
    }

    
    public function update(Request $request, BarangMasuk $barang_masuk) // UPDATE BARANG MASUK
    {
        $this->authorize('tambah barang');
        
        BarangMasuk::where('id', $barang_masuk->id)->update([
            'id_barang'     => $request->input('id_barang'),
            'nama_supplier' => $request->input('nama_supplier'),
            'warna'         => $request->input('warna'),
            'ukuran'        => $request->input('ukuran'),
            'stok'          => $request->input('stok'),
        ]);
        return redirect('/barang-masuk');
    }

    public function update_brg_keluar(Request $request, BarangKeluar $barang_keluar)
    {
        $this->authorize('tambah barang');
        
        BarangKeluar::where('id', $barang_keluar->id)->update([
            'id_barang'     => $request->input('id_barang'),
            'nama_bgudang'  => $request->input('nama_bgudang'),
            'warna'         => $request->input('warna'),
            'ukuran'        => $request->input('ukuran'),
            'stok'          => $request->input('stok'),
        ]);
        return redirect('/barang-keluar');
    }

    
    public function destroy(BarangMasuk $barang_masuk) // HAPUS BARANG MASUK
    {
        $this->authorize('tambah barang');
        
        BarangMasuk::destroy($barang_masuk->id);
        return redirect('/barang-masuk');
    }

    public function destroy_brg_keluar(BarangKeluar $barang_keluar)
    {
        $this->authorize('tambah barang');
        
        BarangKeluar::destroy($barang_keluar->id);
        return redirect('/barang-keluar');
    }
}
