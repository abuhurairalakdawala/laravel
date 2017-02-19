<?php

namespace App\Http\Controllers\Begin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $user = new \App\User([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);
        \DB::transaction(function() use ($request,$user)
        {
            $user->save();
            $user->username = $user->id;
            $user->save();
        });
        Auth::login($user);
        echo json_encode(array('success'=>true,'data'=>$user));
    }
}
