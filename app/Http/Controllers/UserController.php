<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profileimage(){

        return view('admin.');
    }

    public function updateprofileimage(Request $request){

    }
}
