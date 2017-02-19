<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
    	\App\Facades\Assets::setJs('profile.js');
    	$posts = \App\Post::with('user')->get();
    	return view('profile.home',array('posts'=>$posts));
    }
    public function post_new_content(Request $request)
    {
    	$this->validate($request, [
    		'content' => 'required'
    	]);
    	$post = new \App\Post([
    		'post_content' => $request->get('content'),
    		'user_id' => auth()->id()
    	]);
    	$post->save();
    }
}
