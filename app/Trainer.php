<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trainer extends Model
{
    public function attendances(){
        return $this->hasMany('App\Attendance');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'gender', 'subscription_type', 'subscription_date', 'phone', 'expire_date', 'last_attendance'
    ];
 
    public function getGenderAttribute($value)
    {
        if($value == 'male')
            return 'ذكر';
        return 'انثى';
    }
    public function getRenewDateAttribute(){
        if($this->expire_date == $this->last_attendance )
            return Carbon::now()->toDateString('Y-m-d');
        return $this->expire_date;
    }
    public function getSubscriptionTypeAttribute($value){
        if($value == 'month'){
            return 'شهرى';
        }elseif ($value == 'halfmonth') {
            return 'نصف شهرى';
        }
        return 'بالحصة';
    }
    public function getSubscriptionPackageAttribute($value){
        if($value == 'all'){
            return 'حديد + جراية';
        }elseif ($value == 'metal') {
            return 'حديد فقط';
        }elseif ($value == 'walking') {
            return 'جراية فقط';
        }
    }

}
