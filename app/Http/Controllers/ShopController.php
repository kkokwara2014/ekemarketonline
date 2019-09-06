<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops=Shop::orderBy('created_at','desc')->get();
        return view('admin.shop.index',compact('shops'));
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
        $this->validate($request,[
            'businessname'=>'required|string',
            'shopnumber'=>'required',
            'user_id'=>'required',
        ]);

        Shop::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shops=Shop::where('id',$id)->first();;
        return view('admin.shop.edit',compact('shops'));
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
        $this->validate($request,[
            'businessname'=>'required|string',
            'shopnumber'=>'required',
            'user_id'=>'required',
        ]);

        $shop = Shop::find($id);
        $shop->businessname = $request->businessname;
        $shop->shopnumber = $request->shopnumber;
        $shop->user_id = $request->user_id;

        $shop->save();

        return redirect(route('shop.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shops=Shop::where('id',$id)->delete();
        return redirect()->back();
    }
}
