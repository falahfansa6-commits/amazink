<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk1   extends Model
{
    protected $fillable = [
        'urutan',
        'judul',
        'isi',
        'gambar',
    ];
}