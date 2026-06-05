<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'registration_id',
        'jenis_document',
        'claudinary_url',
        'claudinary_public_id',
        'catatan',
    ];
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
