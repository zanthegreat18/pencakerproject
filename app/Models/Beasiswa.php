<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'email',
        'no_telp',
        'foto',
        'min_pendidikan',
    ];
}
