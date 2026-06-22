<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Document;
use App\Models\Registration;
use App\Models\JalurPendaftaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PpdbSeeders extends Seeder
{
    public function run(): void
    {
        $jalurs = JalurPendaftaran::all();

        foreach ($jalurs as $jalur) {
            for ($i = 1; $i <= 50; $i++) {
                $user = User::create([
                    'name' => fake()->name(),
                    'email' => fake()->unique()->safeEmail(),
                    'password' => Hash::make('password'),
                    'role' => 'siswa'
                ]);
                $student = Student::create([
                    'user_id' => $user->id,
                    'nik/nisn' => fake()->unique()->numerify('############'),
                    'nama_lengkap' => fake()->name(),
                    'tempat_lahir' => fake()->city(),
                    'tanggal_lahir' => fake()->date(),
                    'jenis_kelamin' => fake()->randomElement([
                        'Laki-laki',
                        'Perempuan'
                    ]),
                    'agama' => fake()->randomElement([
                        'Islam',
                        'Kristen',
                        'Katolik',
                        'Hindu',
                        'Buddha'
                    ]),
                    'alamat' => $jalur->nama === 'Zonasi'
                        ? fake()->streetAddress() . ', Kec. Kanantok'
                        : fake()->address(),
                    'no_hp' => fake()->numerify('08##########'),
                    'pos' => fake()->numerify('#####'),
                    'ayah' => fake()->name('male'),
                    'kerja_ayah' => fake()->jobTitle(),
                    'ibu' => fake()->name('female'),
                    'kerja_ibu' => fake()->jobTitle(),
                    'wali' => null,
                    'hubungan_wali' => null,
                    'asal_sekolah' => 'SDN ' . rand(1, 50),
                    'nilai_rata_rata' => rand(70, 100),
                ]);
                $registration = Registration::create([
                    'student_id' => $student->id,
                    'jalur_pendaftaran_id' => $jalur->id,
                    'no_daftar' =>
                    'PPDB-' .
                        now()->format('Y') . '-' .
                        str_pad(
                            ($jalur->id * 1000) + $i,
                            4,
                            '0',
                            STR_PAD_LEFT
                        ),
                    'status' => 'terverifikasi',
                    'hasil_seleksi' => 'pending',
                ]);
                foreach (
                    [
                        'kk',
                        'akta',
                        'rapor',
                        'ijazah'
                    ] as $docType
                ) {
                    Document::create([
                        'registration_id' => $registration->id,
                        'jenis_document' => $docType,
                        'cloudinary_url' =>
                        'https://example.com/dummy.pdf',
                        'cloudinary_public_id' =>
                        'dummy_' . fake()->uuid(),
                        'status_verifikasi' => 'verified',
                        'catatan' => null,
                    ]);
                }
            }
        }
    }
}
