<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   
    public function index(){
        $categories=Category::orderBy('name','asc')->get();
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.index',compact('categories'))->with($data);
    }

    public function about()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.about')->with($data);
    }
    
    public function contact()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.contact')->with($data);
    }

    public function cart()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.cart')->with($data);
    }
    public function checkout()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.checkout')->with($data);
    }
    public function shop()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.shop')->with($data);
    }
    public function wishlist()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.wishlist')->with($data);
    }

    public function productSingle()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.product')->with($data);
    }
    
}
