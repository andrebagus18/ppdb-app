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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nik/nisn');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('alamat');
            $table->string('no_hp', 15);
            $table->string('pos', 5);
            $table->string('ayah');
            $table->string('kerja_ayah');
            $table->string('ibu');
            $table->string('kerja_ibu');
            $table->string('wali')->nullable();
            $table->string('hubungan_wali')->nullable();
            $table->string('asal_sekolah');
            $table->decimal('nilai_rata_rata', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
