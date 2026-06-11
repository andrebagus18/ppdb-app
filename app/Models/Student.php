<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'nik/nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_hp',
        'pos',
        'ayah',
        'kerja_ayah',
        'ibu',
        'kerja_ibu',
        'wali',
        'hubungan_wali',
        'asal_sekolah',
        'nilai_rata_rata',
    ];
    public function user()
    {
        // tabel student memiliki relasi dengan tabel user
        return $this->belongsTo(User::class);
    }
    public function registration()
    {
        // tabel student memiliki relasi dengan tabel registration
        return $this->hasOne(Registration::class);
    }
}
