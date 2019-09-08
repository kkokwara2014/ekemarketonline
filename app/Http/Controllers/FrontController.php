<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   
    public function index(){
        $categories=Category::orderBy('name','asc')->get();
        $products=Product::orderBy('created_at','desc')->paginate(20);
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.index',compact('categories','products'))->with($data);
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

    public function productSingle($id)
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        $categories=Category::orderBy('name','asc')->get();
        $products=Product::find($id);
        return view('frontend.product',compact('products','categories'))->with($data);
    }
    public function showprodbycategory($id)
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        $categories=Category::orderBy('name','asc')->get();
        // $products=Product::orderBy('created_at','desc')->paginate(4);
        $products=Category::find($id)->products;
        // $products=Product::find($id);
        return view('frontend.productsbycategory',compact('products','categories'))->with($data);
    }
    
}
