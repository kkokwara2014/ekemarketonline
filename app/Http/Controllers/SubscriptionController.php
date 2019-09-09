<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Auth;
use Image;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscription::orderBy('created_at', 'desc')->get();
        return view('admin.subscription.index', array('user' => Auth::user()), compact('subscribers'));
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
        $formInput = $request->except('imageevidence');
        $this->validate($request, [
            'subscriptionyear' => 'required',
            'amount' => 'required',
            'imageevidence' => 'required|image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($request->hasFile('imageevidence')) {
            $image = $request->file('imageevidence');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('subscription_evidence/' . $imageName));

            $formInput['imageevidence'] = $imageName;
        }

        $subscriber= new Subscription;
        $subscriber->subscriptionyear= $request->subscriptionyear;
        $subscriber->amount= $request->amount;
        $subscriber->imageevidence= $formInput['imageevidence'];
        $subscriber->user_id= $request->user_id;
        
        $subscriber->save();
        
        return redirect()->route('subscription.index');
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
        //
    }
}
