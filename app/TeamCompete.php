<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamCompete extends Model
{
    //

    public function team()
    {
        return $this->belongsTo('App\Teams');
    }

    public function coach(){
        return $this->belongsTo('App\Coaches');
    }


}