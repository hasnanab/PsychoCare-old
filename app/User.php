<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='user';
    protected $fillable = [
        'id','nama', 'username','email','password', 'telepon', 'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function pesan(){
        return $this->hasMany(Pesan::class);
    }
    public function psikiater(){
        return $this->hasOne(Pesan::class, 'user_id','id');
    }
    public function chatmapping(){
        return $this->hasMany(ChatMapping::class);
    }
}
