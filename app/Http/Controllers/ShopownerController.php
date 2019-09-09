<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ShopownerController extends Controller
{
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
}
