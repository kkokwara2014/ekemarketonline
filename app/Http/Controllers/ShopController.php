<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Auth;

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
        
        $users=User::orderBy('lastname','asc')->get();
        return view('admin.shop.index',array('user'=>Auth::user()),compact('shops','users'));
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
        $shopperson=Shop::find($id);
        return view('admin.shopowner.show',array('user'=>Auth::user()),compact('shopperson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shops=Shop::where('id',$id)->first();
        $users=User::orderBy('lastname','asc')->get();
        return view('admin.shop.edit',array('user'=>Auth::user()),compact('shops','users'));
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
