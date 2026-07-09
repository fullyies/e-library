<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {

            $table->id();

            $table->string('kode_pinjam')->unique();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('tanggal_pinjam');

            $table->date('tanggal_kembali');

            $table->enum('status',[
                'Dipinjam',
                'Dikembalikan',
                'Terlambat'
            ])->default('Dipinjam');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};