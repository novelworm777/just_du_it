<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeaderTransaction extends Model
{
    protected $table = 'header_transactions';

    public $timestamps = false;

    protected $fillable = [
        'transaction_date', 'total_price', 'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail_transaction(){
        return $this->hasMany(DetailTransaction::class);
    }
}
