<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imazh extends Model
{   
    protected $guarded = [];
    
    public function makina(){
        return $this->belongsTo(Makina::class);
    }
}