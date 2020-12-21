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
        return $this->hasOne(Shoe::class, 'id', 'shoe_id');
    }

    public function header_transaction(){
        return $this->belongsTo(HeaderTransaction::class);
    }
}
