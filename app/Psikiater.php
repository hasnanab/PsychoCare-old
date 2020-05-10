<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psikiater extends Model
{
    protected $table = 'psikiater';
    protected $fillable = ['tarif'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
