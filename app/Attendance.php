<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates = ['create_at'];

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }
}
