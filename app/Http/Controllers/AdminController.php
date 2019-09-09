<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

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

    public function admins(){
        $admins=User::where('role_id',1)->get();
        return view('admin.admins.index',array('user'=>Auth::user()),compact('admins'));
    }
    public function show($id){
        $admins=User::find($id);
        return view('admin.admins.show',array('user'=>Auth::user()),compact('admins'));
    }
    public function activate($id){

        $admin=User::find($id);
        $admin->isactive='1';
        $admin->save();
        
        return redirect(route('admins.all'));
    }
    public function deactivate($id){

        $admin=User::find($id);
        $admin->isactive='0';
        $admin->save();

        return redirect(route('admins.all'));
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
