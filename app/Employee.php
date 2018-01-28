<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function objectives()
    {
        return $this->hasMany('App\Objective');
    }
}
