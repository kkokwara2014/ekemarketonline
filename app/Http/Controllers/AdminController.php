<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $pageTitle='Dashboard';
        return view('admin.index',compact('pageTitle'));
    }
}
