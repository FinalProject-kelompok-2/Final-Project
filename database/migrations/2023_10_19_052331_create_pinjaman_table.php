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
            $table->string('nama_toko', 20);
            $table->string('foto_ktp');
            $table->string('kk');
            $table->string('npwp');
            $table->string('buku_tabungan');
            $table->string('proposal_bisnis');
            $table->string('laporan_keuangan');
            $table->string('siu');
            $table->string('skdu');
            $table->string('situ');
            $table->float('jml_pinjaman');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
