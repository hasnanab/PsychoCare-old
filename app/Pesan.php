<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
    protected $fillable = ['keluhan', 'from', 'to', 'is_read'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
