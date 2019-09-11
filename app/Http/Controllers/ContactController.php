<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use Illuminate\Http\Request;

use Auth;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $contacts=Contact::orderBy('created_at','desc')->get();

        return view('admin.contact.index', array('user' => Auth::user()),compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('name','asc')->get();
        $data = array(
            'phone' => '+ 234 813 888 3919',
            'email' => 'services@ekemarketonline.com',
            'address' => 'Amangbala Afikpo North Local Government Area'
        );
        return view('frontend.contact',compact('categories'))->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sender'=>'required|string',
            'email'=>'required|email',
            'subject'=>'required|string',
            'messagecontent'=>'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success','Your message has been sent! Thank you.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $contacts=Contact::where('id',$id)->delete();
        return redirect()->back();
    }
}
