<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SomeProduct extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'urutan',
        'gambar',
    ];
}
