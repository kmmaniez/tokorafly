<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->references('id')->on('products');
            $table->string('nama_supplier');
            $table->string('warna');
            $table->integer('ukuran');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_masuk');
    }
};
