<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id'); // Primary key
            $table->unsignedBigInteger('penjualan_id')->index(); // Foreign key ke tabel penjualan
            $table->unsignedBigInteger('barang_id')->index();    // Foreign key ke tabel barang
            $table->integer('harga');    // Harga dengan tipe integer
            $table->integer('jumlah');   // Jumlah barang yang dibeli
            $table->timestamps(); // Created_at dan Updated_at
        });

        // Menambahkan foreign key constraints (Opsional)
        Schema::table('t_penjualan_detail', function (Blueprint $table) {
            $table->foreign('penjualan_id')->references('penjualan_id')->on('t_penjualan')->onDelete('cascade');
            $table->foreign('barang_id')->references('barang_id')->on('m_barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};