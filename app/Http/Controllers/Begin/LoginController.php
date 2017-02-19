<?php

namespace App\Http\Controllers\Begin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index()
    {
    	$errors = Session::get('errors');
    	return view('begin.login',array('errors'=>$errors));
    }
    public function login_user(Request $request)
    {
    	$user = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'is_active' => 1
        );
        if (Auth::attempt($user)) {
        	return redirect('home');
        }
        return redirect('login')
            ->with('login_error', 'Incorrect email/password combination.')
            ->withInput();
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect('login');
    }
}
