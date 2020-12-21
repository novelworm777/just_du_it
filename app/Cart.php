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
<<<<<<< HEAD
        return $this->hasOne(Shoe::class, 'id', 'shoe_id');
=======
        return $this->hasOne(Shoe::class, 'shoe_id');
>>>>>>> d5e0560182aa91ca82eba4d064f716f68f467b66
    }
}
