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
    	// var_dump($_POST);
    	$rules = $this->validate($request, array(
    		'firstname' => 'required',
    		'lastname' => 'required',
    		'email' => 'required',
    		'password' => 'required|confirmed'
    	));
    }
}
