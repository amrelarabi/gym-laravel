<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $dates = ['create_at'];

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trainer_id', 'payment_value'
    ];
 
}
