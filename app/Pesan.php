<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
    protected $fillable = ['umur','keluhan'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
