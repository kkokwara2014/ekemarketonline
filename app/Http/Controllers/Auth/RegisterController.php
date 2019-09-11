<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegistrationForm(){
        $categories=Category::orderBy('name','asc')->get();
        $data=array(
            'phone'=>'+ 234 813 888 3919',
            'email'=>'services@ekemarketonline.com',
            'address'=>'Amangbala Afikpo North Local Government Area'
        );
        return view('auth.register',compact('categories'))->with($data);
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'lastname'=>'required|string',
            'firstname'=>'required|string',
            'email'=>'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user=new User;
        $user->lastname=$request->lastname;
        $user->firstname=$request->firstname;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=bcrypt($request->password);
        $user->role_id=$request->role_id;
        $user->isactive=$request->isactive;

        $user->save();
        
        return redirect(route('login'))->with('success','Your account has been created and will be activated shortly!');

    //         return response()->view('view', compact('data'), 200)
    //  ->header("Refresh", "5;url=/profile");
    }

}
