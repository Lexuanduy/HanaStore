<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;

    public function category() {
        return $this->belongsTo('App\Category','categoryId');
    }

    public function collection() {
        return $this->belongsTo('App\Collection','collectionId');
    }

    public function getDiscountPriceWithFormatAttribute()
    {
        if ($this->discount == 0) {
            return sprintf('%s', number_format($this->price, 0));
        }
        return sprintf('%s', number_format(($this->price - ($this->price * $this->discount / 100)), 0));
    }

    //Hàm tính giá sau khi sale %
    public function getDiscountPriceStringAttribute()
    {
        if ($this->sale == 0) {
            return sprintf('%s (vnd)', number_format($this->price, 0));
        }
        return sprintf('%s (vnd)', number_format(($this->price - ($this->price * $this->sale / 100)), 0));
    }

    public function getOriginalPriceStringAttribute()
    {
        if ($this->discount == 0) {
            return '';
        }
        return sprintf('%s (vnd)', number_format($this->price, 0));
    }

    public function getDiscountPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function isNew()
    {
        // sản phẩm được tạo trong vòng bảy ngày thì là sản phẩm mới.
        return time() - (60 * 60 * 24 * 7) < strtotime($this->created_at);
    }

    public function isDiscount()
    {
        // sản phẩm được tạo trong vòng bảy ngày thì là sản phẩm mới.
        return $this->discount > 0;
    }

    public function getBlockStyleAttribute()
    {
        if ($this->isNew() && $this->isDiscount()) {
            return ' block2-labelnewsale';
        } else if ($this->isNew()) {
            return ' block2-labelnew';
        } else if ($this->isDiscount()) {
            return ' block2-labelsale';
        } else {
            return '';
        }
    }
}
