<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        \DB::enableQueryLog();
    	\App\Facades\Assets::setJs('profile.js');
    	$posts = \App\Post::with(
            [
                'user' => function($query){
                        $query->select('id','firstname','lastname');
                    },
                'userPostLike' => function($query){
                    $query->select('user_id','post_id')->with(
                        [
                            'user' => function($query){
                                $query->select('id','firstname','lastname');
                            }
                        ]
                    );
                }
            ]
        )->orderBy('id','DESC')->select(array('id','post_content','user_id'))->get();
        var_dump(\DB::getQueryLog());
    	return view('profile.home',array('posts'=>$posts));
    }
    public function post_new_content(Request $request)
    {
        // var_dump($request->hasFile('filename'));
        $imageName = mt_rand().'.'.$request->file('filename')->getClientOriginalExtension();
        var_dump($imageName);
        $path = $request->file('filename')->move('images',$imageName);
    	$this->validate($request, [
    		'content' => 'required'
    	]);
    	$post = new \App\Post([
    		'post_content' => $request->get('content'),
    		'user_id' => auth()->id()
    	]);
    	$post->save();
        return array('data'=>$post);
    }
    public function delete_post(\App\Post $id)
    {
        if($id->user_id===auth()->id()){
            $id->delete();
            return json_encode(array('success'=>true));
        }
        return json_encode(array('success'=>false));
    }
}