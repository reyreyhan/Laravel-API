<?php

namespace App\Soldier;

use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
    protected $fillable = [
        'name', 'max_magazine'
    ];

    public function magazine() {
        return $this->hasMany('App\Soldier\Magazine', 'gun_id', 'id');
    }
}
