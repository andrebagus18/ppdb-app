<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'student_id',
        'jalur_pendaftaran_id',
        'no_daftar',
        'status',
        'hasil_seleksi',

    ];
    public function student()
    {
        // tabel registration memiliki relasi dengan tabel student
        return $this->belongsTo(Student::class);
    }
    public function jalur()
    {
        // tabel registration memiliki relasi dengan tabel jalur_pendaftaran
        return $this->belongsTo(JalurPendaftaran::class, 'jalur_pendaftaran_id');
    }
    public function documents()
    {
        // tabel registration memiliki relasi dengan tabel document
        return $this->hasMany(Document::class);
    }
}
