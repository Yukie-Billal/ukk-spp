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
            $table->id('nisn');
            $table->string('nis', 10)->unique();
            $table->string('nama', 35);
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('password');
            $table->string('foto')->nullable();
            $table->foreignId('spp_id')->contrained();
            $table->foreignId('kelas_id')->constrained();
            $table->foreignId('role_id')->default(3)->constrained();
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
