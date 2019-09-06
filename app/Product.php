<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    

    protected $fillable=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
