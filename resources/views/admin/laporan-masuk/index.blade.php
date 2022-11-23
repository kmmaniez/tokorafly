@extends('layouts.main')

@section('konten')
    
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Halaman {{ $title }}</h1>
        
        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama supplier</th>
                                <th>Nama Barang</th>
                                <th>Warna</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Tanggal Masuk</th>
                                {{-- @can('tambah laporan')
                                <th>Aksi</th>
                                @endcan --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lapmasuk as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_supplier }}</td>
                                <td>{{ $data->product->nama_produk }}</td>
                                <td>{{ $data->warna }}</td>
                                <td>{{ $data->ukuran }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>{{ $data->tgl_masuk }}</td>
                                {{-- @can('tambah laporan')
                                <td>
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-sm btn-primary" href="">Edit</a>
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                                @endcan --}}
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7">Data Kosong</td>
                            </tr> 
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

@endsection