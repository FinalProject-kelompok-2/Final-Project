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
            $table->unsignedBigInteger('bank_id');
            $table->string('nama_usaha', 20);
            $table->string('deskripsi_usaha');
            $table->string('foto_ktp');
            $table->string('selfie_ktp');
            $table->string('kk');
            $table->string('npwp');
            $table->string('buku_tabungan');
            $table->string('no_rekening');
            $table->string('nama_rekening');
            $table->string('nama_bank');
            $table->string('proposal_bisnis');
            $table->string('laporan_keuangan');
            $table->string('siu');
            $table->string('skdu');
            $table->string('situ');
            $table->integer('jml_pinjaman');
            $table->integer('tenor');
            $table->float('bunga');
            $table->enum('status', ['Diproses', 'Penawaran', 'Dikonfirmasi', 'Diterima', 'Ditolak'])->default('Diproses');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tenor_id')->references('id')->on('tenor');
            $table->foreign('bank_id')->references('id')->on('bank');
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
