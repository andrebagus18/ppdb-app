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
