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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('jalur_pendaftaran_id')->constrained()->onDelete('cascade');
            $table->string('no_daftar')->unique();
            $table->enum('status', [
                'menunggu_verifikasi',
                'terverifikasi',
            ])
                ->default('menunggu_verifikasi');
            $table->enum('hasil_seleksi', [
                'pending',
                'diterima',
                'tidak_diterima'
            ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
