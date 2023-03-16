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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('pembayaran_id');
            $table->foreignId('petugas_id')->nullable()->constrained()->references('petugas_id');
            $table->foreignId('nisn')->constrained()->references('nisn')->on('siswa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tgl_bayar')->nullable();
            // $table->string('bulan_dibayar');
            $table->foreignId('bulan_dibayar')->constrained()->references('id')->on('bulans');
            $table->string('tahun_dibayar');
            $table->foreignId('spp_id')->references('id')->on('spp');
            $table->integer('jumlah_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
