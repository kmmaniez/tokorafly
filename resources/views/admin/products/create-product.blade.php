@extends('layouts.main')

@section('konten')
    
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-5 text-gray-800">Halaman {{ $title }}</h1>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="row d-block">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama_produk">Barang</label>
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number" class="form-control" name="stok" id="stok">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="warna">Warna</label>
                                        <input type="text" class="form-control" name="warna" id="warna">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="ukuran">Ukuran</label>
                                        <input type="number" class="form-control" name="ukuran" id="ukuran">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-md">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection