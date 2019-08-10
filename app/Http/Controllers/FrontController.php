<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
   
    public function index(){
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.index')->with($data);
    }

    public function about()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.about')->with($data);
    }
    public function contact()
    {
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.contact')->with($data);
    }
}
