<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrata extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function makina(){
        return $this->belongsTo(Makina::class);
    }
}
