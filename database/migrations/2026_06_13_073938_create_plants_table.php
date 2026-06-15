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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
            ->constrained('kategori')
            ->cascadeOnUpdate()
            ->restrictOnDelete();
            $table->string('nama_tanaman', 150);
            $table->date('tgl_tanam');
            $table->string('lokasi', 100);
            $table->enum('kondisi', ['Sehat', 'Kurang Sehat', 'Sakit'])->default('Sehat');
            $table->string('foto', 255)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
