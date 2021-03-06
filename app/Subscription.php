<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable=['subscriptionyear','amount','imageevidence','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
