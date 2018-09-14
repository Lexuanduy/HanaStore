<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    public $timestamps = false;
    public $incrementing = false;

    // one to many
    public function order(){
        return $this->belongsTo('App\Order','orderId');
    }

    // one to many
    public function product(){
        return $this->belongsTo('App\Product', 'productId');
    }
}
