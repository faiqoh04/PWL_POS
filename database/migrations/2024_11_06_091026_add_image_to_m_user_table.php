<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        // Menambahkan kolom 'image' pada tabel 'm_user'
        Schema::table('m_user', function (Blueprint $table) {
            $table->string('image'); // Menambah kolom bertipe string untuk menyimpan nama file gambar
        });
    }

    /**
     * Membatalkan migration.
     */
    public function down(): void
    {
        // Menghapus kolom 'image' dari tabel 'm_user'
        Schema::table('m_user', function (Blueprint $table) {
            $table->dropColumn('image'); // Menghapus kolom 'image' jika migration dibatalkan
        });
    }
};
