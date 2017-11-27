<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coaches extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Teams');
    }

}
