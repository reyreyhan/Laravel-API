<?php

namespace App\Soldier;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'gun_id'
    ];

    public function gun() {
        return $this->belongsTo('App\Soldier\Gun', 'gun_id', 'id');
    }
}
