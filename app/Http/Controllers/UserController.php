<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
// use Intervention\Image\Image;
// use App\Http\Controllers\Image;
use Image;

class UserController extends Controller
{
    public function profileimage(){

        return view('admin.user.profile', array('user'=>Auth::user()));
    }

    public function updateprofileimage(Request $request){
        $this->validate($request,[
            'userimage'=>'required|image|mimes:jpg,jpeg,png|max:10000',
        ]);

        if ($request->hasFile('userimage')) {
            $userimage=$request->file('userimage');
            $filename=time().'_'.$userimage->getClientOriginalExtension();
            Image::make($userimage)->resize(300,300)->save(public_path('user_images/'.$filename));

            $user=Auth::user();
            $user->userimage=$filename;
            $user->save();
        }

        return view('admin.user.profile', array('user'=>Auth::user()));
    }
}
