<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopownerController extends Controller
{
    public function shopowners(){
        $shopowners=User::all()->role()->where('role_id',2)->get();
        return view('admin.shopowner.index',compact('shopowners'));
    }
    public function show($id){
        $shopowners=User::all()->role()->where('role_id',2)->get();
        return view('admin.shopowner.show',compact('shopowners'));
    }
    public function activate($id){

        $shopowner=User::find($id);
        $shopowner->isactive='1';
        return back();
    }
}
