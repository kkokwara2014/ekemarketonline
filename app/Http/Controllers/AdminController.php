<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user=Auth::user();
        return view('admin.index',compact('user'));
    }

    public function shopowners(){
        $shopowners=User::where('role_id',2)->get();
        return view('admin.shopowner.index',array('user'=>Auth::user()),compact('shopowners'));
    }
    public function show($id){
        $shopowners=User::find($id);
        return view('admin.shopowner.show',array('user'=>Auth::user()),compact('shopowners'));
    }
    public function activate($id){

        $shopowner=User::find($id);
        $shopowner->isactive='1';
        $shopowner->save();
        
        return redirect(route('shopowner.all'));
    }
    public function deactivate($id){

        $shopowner=User::find($id);
        $shopowner->isactive='0';
        $shopowner->save();

        return redirect(route('shopowner.all'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
