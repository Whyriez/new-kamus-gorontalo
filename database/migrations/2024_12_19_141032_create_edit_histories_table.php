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
        Schema::create('edit_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kata')->constrained('katas', 'id_kata')->onDelete('cascade'); // Relasi ke kata
            $table->foreignId('id_editor')->constrained('users', 'id')->onDelete('cascade'); // Relasi ke user
            $table->enum('action', ['create', 'edit']); // Tipe aksi (create atau edit)
            $table->text('activity')->nullable();
            $table->timestamps(); // Created_at, Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edit_histories');
    }
};
