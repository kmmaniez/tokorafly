<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // FITUR DONE ALL
    // public function __construct() {
    //     $this->authorize('tambah barang');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Product::all()->groupBy('id')->sortBy('asc');
        // dd($data->toArray());
        return view('admin.products.index', [
            'title'     => 'Data Barang',
            'produk'    => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('tambah barang');
        return view('admin.products.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_produk'   => 'required|string|max:50',
            'warna'         => 'required',
            'ukuran'        => 'required',
            'stok'          => 'required',
        ]);

        // $request->user()->chirps()->create($validated);
        Product::create([
            'nama_produk'   => $request->input('nama_produk'),
            'warna'         => $request->input('warna'),
            'ukuran'        => $request->input('ukuran'),
            'stok'          => $request->input('stok')
        ]);
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('admin.products.edit-product', ['produk' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $validated = $request->validate([
            'nama_produk'   => 'required|string|max:15',
            'warna'         => 'required',
            'ukuran'        => 'required',
            'stok'          => 'required',
        ]);
        Product::where('id', $product->id)->update($validated);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        Product::destroy($product->id);
        return redirect(route('products.index'));
    }
}
