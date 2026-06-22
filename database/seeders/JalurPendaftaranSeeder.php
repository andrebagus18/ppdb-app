<?php

namespace Database\Seeders;

use App\Models\JalurPendaftaran;
use Illuminate\Database\Seeder;

class JalurPendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        $jalurs = [
            [
                'nama' => 'Reguler',
                'kuota' => 30,
                'deskripsi' => 'Jalur reguler'
            ],
            [
                'nama' => 'Prestasi',
                'kuota' => 20,
                'deskripsi' => 'Jalur prestasi'
            ],
            [
                'nama' => 'Zonasi',
                'kuota' => 35,
                'deskripsi' => 'Jalur zonasi'
            ],
            [
                'nama' => 'Afirmasi',
                'kuota' => 15,
                'deskripsi' => 'Jalur afirmasi'
            ]
        ];

        foreach ($jalurs as $jalur) {
            JalurPendaftaran::updateOrCreate(
                ['nama' => $jalur['nama']],
                $jalur
            );
        }
    }


    // public function run(): void
    // {
    //     JalurPendaftaran::create([
    //         'nama' => 'Reguler',
    //         'kuota' => 20,
    //         'deskripsi' => 'Seleksi berdasarkan nilai rata-rata rapor tertinggi.',
    //     ]);
    //     JalurPendaftaran::create([
    //         'nama' => 'Prestasi',
    //         'kuota' => 8,
    //         'deskripsi' => 'Wajib upload piagam serta seleksi berdasarkan nilai tertinggi.',
    //     ]);
    //     JalurPendaftaran::create([
    //         'nama' => 'Zonasi',
    //         'kuota' => 5,
    //         'deskripsi' => 'Seleksi berdasarkan nilai rata-rata rapor tertinggi.',
    //     ]);
    //     JalurPendaftaran::create([
    //         'nama' => 'Afirmasi',
    //         'kuota' => 10,
    //         'deskripsi' => 'Wajib upload surat keterangan keluarga kurang mampu atau penerima program bantuan pemerintah',
    //     ]);
    // }
}
