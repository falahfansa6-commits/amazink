<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpatKontak extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'link',
        'urutan'
    ];
}
