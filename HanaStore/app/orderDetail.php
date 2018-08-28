<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'productId');
    }
}
