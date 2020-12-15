<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'shoe_id', 'quantity',
    ];
}
