<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingatlan extends Model
{
    //
    public function kategoria()
    {
        return $this->belongsTo('App\Models\Kategoria');
    }
    public $table = 'ingatlanok';
    public $timestamps = false;


}
