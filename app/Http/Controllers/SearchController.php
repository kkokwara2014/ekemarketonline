<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchproduct(Request $request)
    {
        $productname = $request->productname;

        if ($productname != "") {
            $product = Product::where('name', 'LIKE', '%' . $productname . '%')->orWhere('price', 'LIKE', '%' . $productname . '%')->orWhere('description', 'LIKE', '%' . $productname . '%')->paginate(20);
            if (count($product)>0) {
               return view('frontend.index')->withDetails($product)->withQuery($productname);
            }
        }

        return view('frontend.index')->withMessage('No Product matched your search entry!');
    }
}
