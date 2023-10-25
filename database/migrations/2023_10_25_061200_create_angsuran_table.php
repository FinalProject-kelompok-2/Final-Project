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
        Schema::create('angsuran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pinjaman_id');
            $table->integer('periode');
            $table->integer('biaya_angsuran');
            $table->date('jatuh_tempo');
            $table->string('bukti_pembayaran')->nullable(true);
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('pinjaman_id')->references('id')->on('pinjaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angsuran');
    }
};
