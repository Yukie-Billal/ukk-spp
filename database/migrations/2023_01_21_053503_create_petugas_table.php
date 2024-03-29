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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id('petugas_id');
            $table->string('username', 35);
            $table->string('password', 100);
            $table->string('nama_petugas', 35);
            $table->text('alamat', 35);
            $table->text('no_telp', 13);
            $table->string('foto')->nullable();
            $table->foreignId('role_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};