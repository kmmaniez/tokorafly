<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
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
        return view('admin.dashboard', [
            'total_product'     => Product::all()->count(),
            'total_brg_masuk'   => rand(5,20) * 4,
            'total_brg_keluar'  => rand(5,20) * 6,
            'total_laporan'     => rand(5,10) * 4,
        ]);
    });
})->name('dashboard');

Route::group(['prefix' => 'barang-keluar'], function(){
    Route::get('/', [TransactionController::class, 'index_brg_keluar']); // TAMPIL TABEL BARANG KELUAR
    Route::get('tambah-barang', [TransactionController::class, 'create_brg_keluar']); // TAMPILAN VIEW CREATE
    Route::post('tambah-barang', [TransactionController::class, 'store_brg_keluar']); // SIMPAN BARANG

    Route::get('edit-barang', [TransactionController::class, 'create_brg_keluar']); // TAMPILAN VIEW EDIT
    Route::post('edit-barang', [TransactionController::class, 'update_brg_keluar']); // SIMPAN UPDATE BARANG

    Route::delete('delete-barang', [TransactionController::class, 'destroy_brg_keluar']); // DELETE BARANG
});

Route::middleware(['auth'])->group(function () {

    // Route khusus laporan masuk
    Route::resource('/laporan-masuk', LaporanController::class)
        ->only('index','create','store');

    // Route khusus laporan keluar
    Route::prefix('/laporan-keluar')->group(function () {
        Route::get('/', [LaporanController::class, 'index_brg_keluar']);

        Route::get('/tambah-laporan', [LaporanController::class, 'create_brg_keluar']); // VIEW TAMBAH DATA
        Route::post('/tambah-laporan', [LaporanController::class, 'store_brg_keluar']); // SIMPAN DATA

        // Route::post('/laporan-keluar', [LaporanController::class, 'store_brg_keluar']); // SIMPAN LAPORAN KELUAR
        
    });
    
    // Route khusus barang
    Route::resource('products', ProductController::class)
        ->only(['index','create','store','edit','update','destroy']);

    // Route khusus barang masuk
    Route::resource('/barang-masuk', TransactionController::class);
});


require __DIR__.'/auth.php';
