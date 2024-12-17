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
        Schema::create('katas', function (Blueprint $table) {
            $table->id('id_kata');
            $table->String('indonesia');
            $table->String('gorontalo');
            $table->String('kategori')->nullable();
            $table->String('kesopanan')->nullable();
            $table->String('kalimat')->nullable();
            $table->String('pengucapan')->nullable();
            $table->String('gambar')->nullable();
            $table->String('suara')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katas');
    }
};
