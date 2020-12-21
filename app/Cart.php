<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'shoe_id', 'quantity', 'total_price',
    ];

    public function shoe(){
        return $this->hasOne(Shoe::class, 'id', 'shoe_id');
    }
}
