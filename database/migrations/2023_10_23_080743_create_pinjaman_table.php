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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tenor_id');
            $table->string('nama_usaha', 20);
            $table->string('foto_ktp');
            $table->string('kk');
            $table->string('npwp');
            $table->string('buku_tabungan');
            $table->string('proposal_bisnis');
            $table->string('laporan_keuangan');
            $table->string('siu');
            $table->string('skdu');
            $table->string('situ');
            $table->integer('jml_pinjaman');
            $table->integer('tenor');
            $table->integer('bunga');
            $table->enum('status', ['Validasi', 'Diterima', 'Ditolak'])->default('Validasi');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tenor_id')->references('id')->on('tenor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
