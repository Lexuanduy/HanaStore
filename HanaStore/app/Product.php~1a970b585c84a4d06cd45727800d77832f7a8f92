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
}
