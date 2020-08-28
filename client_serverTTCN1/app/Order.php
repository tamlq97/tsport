<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $guarded = [];
    public function detail()
    {
        # code...
        return $this->hasMany('App\OrderDetail');
    }
    public function customer()
    {
        # code...
        return $this->hasOne('App\Customer', 'user_id', 'user_id');
    }
    public function payment()
    {
        # code...
        return $this->hasOne('App\Payment', 'id', 'payment_id');
    }

    public function scopeOrderCode($query,$madh){
        return $query->where('madh', $madh);
    }
}
