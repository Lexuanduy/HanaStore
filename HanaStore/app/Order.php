<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = true;

    public function customer(){
        return $this->belongsTo('App\Customer','customerId');
    }

    public function order_detail(){
        return $this->hasMany('App\OrderDetail','orderId');
    }
}
