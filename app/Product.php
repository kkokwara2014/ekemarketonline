<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    

    protected $fillable=['name','price','description','image','shop_id','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
