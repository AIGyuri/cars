<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    //
    public function ingatlanok()
    {
        return $this->hasMany('App\Models\Ingatlan');
    }
    public $table = 'kategoriak';
    public $timestamps = false;

}
