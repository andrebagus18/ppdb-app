<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_hp',
        'nama_ayah',
        'kerja_ayah',
        'nama_ibu',
        'kerja_ibu',
        'nama_wali',
        'kerja_wali',
        'asal_sekolah',
        'nilai_rata_rata',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
