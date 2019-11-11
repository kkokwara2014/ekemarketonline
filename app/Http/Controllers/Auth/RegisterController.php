<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Twilio\Rest\Client;

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

    public function showRegistrationForm()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $data = array(
            'phone' => '+ 234 813 888 3919',
            'email' => 'services@ekemarketonline.com',
            'address' => 'Amangbala Afikpo North Local Government Area'
        );
        return view('auth.register', compact('categories'))->with($data);
    }

    public function register(Request $request)
    {
        // $sid    = env('TWILIO_SID');
        // $token  = env('TWILIO_TOKEN');
        // $client = new Client($sid, $token);

        $this->validate($request, [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->isactive = $request->isactive;

        $user->save();

        
        // $client->messages->create(
        //     $request->phone,
        //     [
        //         'from' => env('TWILIO_FROM'),
        //         'body' => 'You have registered as a Shop Owner on Ekemarketonline.com. Your account will be activated shortly.\n
        //                     Thank you.',
        //     ]
        // );

        $message=urlencode("Your account has been created successfully and you will be communicated shortly. \nThanks for joining www.ekemarketonline.com");
        $sender=urlencode("Ekemarket");
        $recipient=urlencode($request->phone);

        $this->sendsms($recipient,$sender,$message);

        return redirect(route('login'))->with('success', 'Your account has been created and will be activated shortly!');
    }

    public function sendsms($recipient,$sender,$message)
    {
        $message=$message;
        $sender=$sender;
        $recipient=$recipient;
        $api_username="kkokwara2014";
        $api_password="@Victorkk78";
        return file('https://angelicsms.com/index.php?option=com_spc&comm=spc_api&username='.$api_username.'&password='.$api_password.'&sender='.$sender.'&recipient='.$recipient.'&message='.$message.'');        
    }
}
