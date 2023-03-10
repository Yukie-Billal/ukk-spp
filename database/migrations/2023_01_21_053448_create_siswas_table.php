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
        Schema::create('siswa', function (Blueprint $table) {
            // $table->id();
            $table->string('nisn', 10)->primary();
            $table->string('nis', 8);
            $table->string('nama', 35);
            $table->foreignId('kelas_id')->constrained();
            $table->text('alamat');
            $table->string('no_telp');
            $table->foreignId('spp_id')->contrained();
            $table->foreignId('user_id')->contrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
