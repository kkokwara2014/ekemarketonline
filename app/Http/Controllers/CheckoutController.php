<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function registerbuyer(){
        $categories=Category::orderBy('name','asc')->get();
        $products=Product::orderBy('created_at','desc')->paginate(20);
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );

        return view('frontend.checkout.buyercheckout',compact('categories','products'))->with($data);
    }

    public function buyeraddress(){

    }
}
