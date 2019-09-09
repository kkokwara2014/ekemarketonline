<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use \Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except(['logout','userLogout']);
    }

    public function showLoginForm()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $data = array(
            'phone' => '+ 234 813 888 3919',
            'email' => 'services@ekemarketonline.com',
            'address' => 'Amangbala Afikpo North Local Government Area'
        );
        return view('auth.login', compact('categories'))->with($data);
    }

    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'isactive' => '1'];
    }


    public function userLogout()
    {
        $this->guard()->logout();

        return redirect(route('index'));
    }
}
