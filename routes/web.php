<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Models\BarangKeluar;
// use App\Http\Controllers\SupplierController;
// use App\Http\Controllers\TransactionController;
use App\Models\BarangMasuk;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->to('/dashboard');
    });
    Route::get('/dashboard', function () {
        $barangmasuk    = BarangMasuk::all()->count();
        $barangkeluar   = BarangKeluar::all()->count();
        return view('admin.dashboard', [
            'total_product'     => Product::all()->count(),
            'total_brg_masuk'   => $barangmasuk,
            'total_brg_keluar'  => $barangkeluar,
            'total_laporan'     => $barangmasuk + $barangkeluar,
        ]);
    });
})->name('dashboard');

Route::middleware(['auth'])->group(function () {    
    // ONLY = MENAMPILKAN ROUTE METHOD DI CONTROLLER, KECUALI METHOD SHOW
    // cek route : php artisan route:list

    // Route khusus barang
    Route::resource('products', ProductController::class)
        ->only(['index','create','store','edit','update','destroy']);

    // Route khusus barang masuk
    Route::resource('/barang-masuk', BarangController::class)
        ->only(['index','create','store','edit','update','destroy']);


    // Route khusus barang keluar
    // prefix url = localhost/barang-keluar
    /* cth akses dibawah : 
        localhost/barang-keluar/tambah-barang
        localhost/barang-keluar/{barang_keluar}/edit
    */
    Route::prefix('barang-keluar')->group(function () {
        
        Route::get('/', [BarangController::class, 'index_brg_keluar']); // HALAMAN AWAL TABEL

        Route::get('tambah-barang', [BarangController::class, 'create_brg_keluar']); // HALAMAN TAMBAH BRG
        Route::post('tambah-barang', [BarangController::class, 'store_brg_keluar']); // PROSES SIMPAN BRG
        
        Route::get('{barang_keluar}/edit', [BarangController::class, 'edit_brg_keluar']); // HALAMAN EDIT BRG
        Route::put('{barang_keluar}', [BarangController::class, 'update_brg_keluar']); // PROSES EDIT BRG

        Route::delete('/{barang_keluar}', [BarangController::class, 'destroy_brg_keluar']); // PROSES HAPUS BRG
    });

    
});


Route::get('/laporan-masuk', function (){ // HALAMAN LAPORAN MASUK
    return view('admin.laporan-masuk.index',[
        'title'         => 'Laporan Barang Masuk',
        'lapmasuk'      => BarangMasuk::all()
    ]);
});
Route::get('/laporan-keluar', function (){ // HALAMAN LAPORAN KELUAR
    return view('admin.laporan-keluar.index',[
        'title'         => 'Laporan Barang Keluar',
        'lapkeluar'     => BarangKeluar::all()
    ]);
});

require __DIR__.'/auth.php';
