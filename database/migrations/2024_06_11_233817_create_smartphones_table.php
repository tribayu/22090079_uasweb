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
        Schema::create('smartphones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_smartphone');
            $table->decimal('harga', 8, 2);
            $table->integer('penyimpanan');
            $table->integer('kualitas_kamera');
            $table->decimal('kecepatan_prosesor', 5, 2);
            $table->integer('waktu_pengisian');
            $table->integer('berat');
            $table->integer('garansi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smartphones');
    }
};
