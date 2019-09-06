<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname','firstname', 'email','phone', 'password','role_id','isactive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
    public function shops(){
        return $this->hasMany(Shop::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function userimage(){
        return $this->hasOne(Userimage::class);
    }
}
