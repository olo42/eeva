<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
