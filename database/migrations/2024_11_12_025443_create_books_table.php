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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('judul_buku');
            $table->string('penulis');
            $table->string('kategori');
            $table->smallInteger('tahun_terbit');
            $table->integer('jumlah_stok');
            $table->boolean('status')->default(true);
            $table->string('deskripsi')->default(0);
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
