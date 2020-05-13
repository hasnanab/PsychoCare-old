<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMapping extends Model
{
    protected $table= 'chat_mapping';
    protected $fillable = ['id', 'pasien_id', 'psikiater_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
