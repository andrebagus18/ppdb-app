<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'registration_id',
        'jenis_document',
        'cloudinary_url',
        'cloudinary_public_id',
        'status_verifikasi',
        'catatan',
    ];
    public function registration()
    {
        // tabel document memiliki relasi dengan tabel registration 
        return $this->belongsTo(Registration::class);
    }
}
