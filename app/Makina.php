<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makina extends Model
{
    protected $guarded = ['id']; 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kontratat(){
        return $this->hasMany(Kontrata::class);
    }

    public function imazhet(){
        return $this->hasMany(Imazh::class);
    }
}
