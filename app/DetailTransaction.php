<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'detail_transactions';

    public $timestamps = false;

    protected $fillable = [
        'transaction_id', 'shoe_id', 'quantity',
    ];

    public function shoe(){
<<<<<<< HEAD
        return $this->hasOne(Shoe::class, 'id', 'shoe_id');
=======
        return $this->hasOne(Shoe::class);
    }

    public function header_transaction(){
        return $this->belongsTo(HeaderTransaction::class);
>>>>>>> d5e0560182aa91ca82eba4d064f716f68f467b66
    }
}
