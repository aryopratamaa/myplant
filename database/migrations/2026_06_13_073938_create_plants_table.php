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
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->string('nama_tanaman');
            $table->date('tgl_tanam');
            $table->string('lokasi');
            $table->enum('kondisi', ['Sehat', 'Kurang Sehat', 'Sakit'])->default('Sehat');
            $table->string('foto');
            $table->text('catatan');
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
