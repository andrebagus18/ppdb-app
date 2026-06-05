<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'student_id',
        'jalur_id',
        'no_daftar',
        'status',
        'hasil_seleksi',

    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function jalur()
    {
        return $this->belongsTo(JalurPendaftaran::class);
    }
    public function document()
    {
        return $this->hasMany(Document::class);
    }
}
