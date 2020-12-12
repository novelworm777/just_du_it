<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    public function shoe(){
        return $this->belongsTo(Shoe::class);
    }
}
