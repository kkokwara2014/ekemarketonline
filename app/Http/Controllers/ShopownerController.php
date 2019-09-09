<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopownerController extends Controller
{
    public function shopowners(){
        $shopowners=User::where('role_id',2)
    }
}
