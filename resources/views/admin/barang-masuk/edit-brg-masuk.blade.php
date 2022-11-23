@extends('layouts.main')

@section('konten')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-5 text-gray-800">Halaman {{ $title }}</h1>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="/barang-masuk/{{ $brgmasuk->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama_supplier">Nama Supplier</label>
                                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier', $brgmasuk->nama_supplier) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="id_barang">Barang</label>
                                        <select name="id_barang" id="id_barang" class="form-control">
                                            @foreach ($products as $produk)
                                            @if (old('id_barang', $brgmasuk->id_barang) == $produk->id)
                                                <option value="{{ $produk->id }}" selected>{{ $produk->nama_produk }}</option>
                                            @else
                                                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>   
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="text" class="form-control" name="stok" id="stok" value="{{ old('stok', $brgmasuk->stok) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="warna">Warna</label>
                                        <input type="text" class="form-control" name="warna" id="warna" value="{{ old('warna', $brgmasuk->warna) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="ukuran">Ukuran</label>
                                        <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{ old('ukuran', $brgmasuk->ukuran) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tgl_masuk">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" value="{{ old('tgl_masuk', $brgmasuk->tgl_masuk) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-md">Edit data</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection