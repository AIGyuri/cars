<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerdes extends Model
{
    //
    protected $table = 'kerdesek';
    protected $casts = [
        'valaszok' => 'array',
    ];
    public $timestamps = false;
}
