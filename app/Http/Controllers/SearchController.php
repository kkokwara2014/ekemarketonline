<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchproduct(Request $request)
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        $categories=Category::orderBy('name','asc')->get();

        $productname = $request->productname;

        if ($productname != "") {
            $product = Product::where('name', 'LIKE', '%' . $productname . '%')->orWhere('price', 'LIKE', '%' . $productname . '%')->orWhere('description', 'LIKE', '%' . $productname . '%')->get();
            if (count($product)>0) {
               return view('frontend.productsearch',compact('categories'))->withDetails($product)->withQuery($productname)->with($data);
            }
        }

        return view('frontend.productsearch',compact('categories'))->withMessage('No Product matched your entry!')->with($data);
    }
}
