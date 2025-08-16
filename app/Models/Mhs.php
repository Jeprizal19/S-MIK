<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mhs extends Model
{
    protected $table = 'mhs';
    protected $fillable = [
        'npm', 'nama_mhs', 'program_studi'
    ];
}
