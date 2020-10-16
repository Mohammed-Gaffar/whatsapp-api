<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public function marketer(){
        return $this->belongsTo('app\User','user_id');
    }
}
