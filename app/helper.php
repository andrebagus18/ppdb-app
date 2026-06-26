<?php

if (!function_exists('getInitial')) {
    function getInitial($name)
    {
        return strtoupper(substr(trim($name), 0, 1));
    }
}
if (!function_exists('role')) {
    function role($role)
    {
        return match ($role) {
            'admin' => 'Admin',
            'panitia' => 'Panitia',
            'siswa' => 'Calon Siswa',
            default => ucfirst($role),
        };
    }
}
if (!function_exists('getStatus')) {
    function getStatus($documents)
    {
        if ($documents->isEmpty()) {
            return [
                'bg' => 'bg-gray-500 text-white',
                'title' => 'Belum Mengunggah Dokumen'
            ];
        }

        if ($documents->contains('status_verifikasi', 'rejected')) {
            return [
                'bg' => 'bg-red-500',
                'title' => 'Berkas Anda Ditolak'
            ];
        }

        if ($documents->every(
            fn($doc) => $doc->status_verifikasi === 'verified'
        )) {
            return [
                'bg' => 'bg-green-500',
                'title' => 'Berkas Anda Diterima'
            ];
        }

        return [
            'bg' => 'bg-yellow-500',
            'title' => 'Berkas Anda Sedang Diverifikasi'
        ];
    }
}

if (!function_exists('statusSiswa')) {
    function statusSiswa($registration)
    {
        return match ($registration?->status) {

            'terverifikasi' => [
                'bg' => 'bg-green-100 text-green-800',
                'title' => 'Terverifikasi'
            ],

            'menunggu_verifikasi' => [
                'bg' => 'bg-amber-100 text-amber-800',
                'title' => 'Menunggu Verifikasi'
            ],

            default => [
                'bg' => 'bg-yellow-100 text-yellow-800',
                'title' => 'Pending'
            ]
        };
    }
}
if (!function_exists('documentLabel')) {
    function documentLabel($jenis)
    {
        return match ($jenis) {
            'foto' => 'Foto',
            'kk' => 'Kartu Keluarga',
            'akta' => 'Akta Lahir',
            'ijazah' => 'Ijazah Terakhir',
            'surat_jalur' => 'Surat Jalur',
        };
    }
}
if (!function_exists('statusColor')) {
    function statusColor($status)
    {
        return match ($status) {
            'terverifikasi' => 'bg-green-100 text-green-700',
            'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
            'ditolak' => 'bg-red-100 text-red-700',
            default => 'bg-slate-100 text-slate-600',
        };
    }
}
if (!function_exists('statusPengumuman')) {
    function statusPengumuman($announcement)
    {
        return match ((bool) $announcement?->is_published) {

            true => [
                'bg' => 'bg-green-900/30 text-green-500',
                'title' => 'Published'
            ],

            false => [
                'bg' => 'bg-amber-900/30 text-amber-500',
                'title' => 'Draft'
            ]
        };
    }
}

if (!function_exists('statusDocument')) {
    function statusDocument($document)
    {
        return match ($document->status_verifikasi) {
            'verified' => [
                'bg' => 'bg-green-500',
                'title' => 'Diterima'
            ],
            'rejected' => [
                'bg' => 'bg-red-500',
                'title' => 'Ditolak'
            ],
            default => [
                'bg' => 'bg-yellow-500',
                'title' => 'Menunggu Verifikasi'
            ]
        };
    }
}

if (!function_exists('hasilSeleksi')) {
    function hasilSeleksi($registration)
    {
        if (!$registration || empty($registration->hasil_seleksi) || $registration->hasil_seleksi === 'pending') {
            return [
                'title' => 'Menunggu Hasil Seleksi',
                'bg' => 'bg-yellow-100 text-yellow-700'
            ];
        }
        if ($registration->hasil_seleksi === 'diterima') {
            return [
                'title' => 'Diterima',
                'bg' => 'bg-green-100 text-green-700'
            ];
        }
        return [
            'title' => 'Tidak Diterima',
            'bg' => 'bg-red-100 text-red-700'
        ];
    }
}
