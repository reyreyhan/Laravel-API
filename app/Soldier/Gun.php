<?php

namespace App\Soldier;

use Illuminate\Database\Eloquent\Model;

class Gun extends Model
{
    protected $fillable = [
        'name', 'max_magazine'
    ];
}
