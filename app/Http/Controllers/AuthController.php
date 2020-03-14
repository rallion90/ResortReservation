<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator,Redirect,Response;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

Use App\User;

use Session;

class AuthController extends Controller
{
    public function index(){
    	return view('auth.login');
    }

    public function register(){
    	return view('auth.register');
    }

    public function login_trigger(Request $request){
    	$email = $request->input('email');
    	$password = $request->input('password');

    	$validate_login = $request->validate([
    		'email' => 'required',
    		'password' => 'required|min:8'
    	]);

    	$credentials = $request->only('email', 'password');

    	if(Auth::attempt($credentials)){
    		//$message = "Welcome ".Auth::user()->fullname."!";
    		return redirect('sadyaya/home')->with('login_success', 'Welcome');

    		//echo Auth::user()->fullname;
    	}
    	else{
    		return redirect('authentication/login')->with('password_email_invalid', 'Email or Password is Invalid');
    	}	
    }

    public function registration(Request $request){
    	$fullname = $request->input('fullname');
    	$email = $request->input('email');
    	$password = $request->input('password');
    	$repeat_password = $request->input('repeat_password');

    	$validating_registration = $request->validate([
    		'fullname' => 'required|max:255',
    		'email' => 'required',
    		'password' => 'required|min:8|same:repeat_password',
    		'repeat_password' => 'required|min:8'
    	]);

    	$data = $request->all();
    	$create_data = $this->create($data); //tatawagin  ang  create function

    	return redirect()->route('login')->with('register', 'Your Registration is Succesful');
    }


    public function create(array $data){
      return User::create([
        'fullname' => $data['fullname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return Redirect('authentication/login');
    }

}
