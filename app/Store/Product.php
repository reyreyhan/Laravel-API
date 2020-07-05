<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'stock'
    ];

    public function transaction() {
        return $this->hasMany('App\Store\Transaction', 'product_id', 'id');
    }
}
