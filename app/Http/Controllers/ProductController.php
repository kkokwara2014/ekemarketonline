<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Shop;
use Auth;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('name','asc')->get();
        $shops=Shop::orderBy('shopnumber','asc')->get();
        $products=Product::orderBy('created_at','desc')->get();
        return view('admin.product.index',array('user'=>Auth::user()),compact('categories','shops','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput=$request->except('image');
        $this->validate($request,[
            'name'=>'required|string',
            'price'=>'required',
            'description'=>'required|string',
            'shop_id'=>'required',
            'category_id'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('product_images/'.$imageName));

            $formInput['image']=$imageName;
        }

        Product::create($formInput);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('admin.product.show',array('user'=>Auth::user()),compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shops=Shop::orderBy('shopnumber','asc')->get();
        $categories=Category::orderBy('name','asc')->get();
        $products=Product::where('id',$id)->first();
        return view('admin.product.edit',array('user'=>Auth::user()),compact('shops','categories','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formInput=$request->except('image');
        $this->validate($request,[
            'name'=>'required|string',
            'price'=>'required',
            'description'=>'required|string',
            'shop_id'=>'required',
            'category_id'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('product_images/'.$imageName));

            $formInput['image']=$imageName;
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->shop_id = $request->shop_id;
        $product->category_id = $request->category_id;
        $product->image = $formInput['image'];

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Product::where('id',$id)->delete();
        return redirect()->back();
    }
}
