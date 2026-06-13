<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    protected $fillable = [
        'nama',
        'kuota',
        'deskripsi',
    ];
    public function registration()
    {
        return $this->hasMany(Registration::class, 'jalur_pendaftaran_id');
    }
}
