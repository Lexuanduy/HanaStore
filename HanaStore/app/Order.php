<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function details()
    {
        return $this->hasMany('App\orderDetail', 'orderId');
    }

    public function getShipInformationAttribute()
    {
        return ' - '. $this->shipPhone . '<br> - '. $this->shipName . '<br> - ' . $this->shipAddress;
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case -1:
                return 'Đã huỷ';
                break;
            case 0:
                return 'Chờ xử lý';
                break;
            case 1:
                return 'Đã xác nhận';
                break;
            case 2:
                return 'Hoàn thành';
                break;
            default:
                return 'Không xác định';
                break;
        }
    }

}
