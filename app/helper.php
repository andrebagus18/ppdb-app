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
                'bg' => 'bg-red-100 text-red-800',
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
