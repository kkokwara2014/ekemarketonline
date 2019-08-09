<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data['pageTitle']='Dashboard';
        return view('admin.index',compact($data));
    }
}
