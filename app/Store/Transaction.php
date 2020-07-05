<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'product_id', 'piece', 'total'
    ];

    public function Product() {
        return $this->belongsTo('App\Store\Product', 'product_id', 'id');
    }

}
