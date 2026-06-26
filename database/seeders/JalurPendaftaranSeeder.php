<?php

namespace Database\Seeders;

use App\Models\JalurPendaftaran;
use Illuminate\Database\Seeder;

class JalurPendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        JalurPendaftaran::create([
            'nama' => 'Reguler',
            'kuota' => 20,
            'deskripsi' => 'Seleksi berdasarkan nilai rata-rata rapor tertinggi.',
        ]);
        JalurPendaftaran::create([
            'nama' => 'Prestasi',
            'kuota' => 8,
            'deskripsi' => 'Wajib upload piagam serta seleksi berdasarkan nilai tertinggi.',
        ]);
        JalurPendaftaran::create([
            'nama' => 'Zonasi',
            'kuota' => 5,
            'deskripsi' => 'Seleksi berdasarkan nilai rata-rata rapor tertinggi.',
        ]);
        JalurPendaftaran::create([
            'nama' => 'Afirmasi',
            'kuota' => 10,
            'deskripsi' => 'Wajib upload surat keterangan keluarga kurang mampu atau penerima program bantuan pemerintah',
        ]);
    }
}
