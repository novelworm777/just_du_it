<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    protected $table = 'shoes';

    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'price', 'image',
    ];
}
