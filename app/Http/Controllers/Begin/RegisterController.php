<?php

namespace App\Http\Controllers\Begin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
    	\App\Facades\Assets::setCss('register.css');
    	\App\Facades\Assets::setJs('user_register.js');
    	\App\Facades\HtmlTags::setTitle('Register Your Account!');
    	return view('begin.register');
    }
    public function register(Request $request)
    {
        $this->validate($request, array(
    		'firstname' => 'required|max:30',
    		'lastname' => 'required|max:30',
    		'email' => 'required|email|max:100|unique:users',
    		'password' => 'required|min:4|confirmed'
    	));
    }
}
