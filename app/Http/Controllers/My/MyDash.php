<?php

namespace App\Http\Controllers\My;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MyDash extends Controller
{
    public function index()
    {
        if(session()->has('indexAction')){
            $table = \App\Post::orWhere('likes_count','like','%0%');
            $table->paginate(2);
        } else {
            $table = \App\Post::paginate(2);
        }
        $table->orWhere('likes_count','like','%%');

        // return view("index", array('table' => $table));
    }
    public function indexAction(Request $request)
    {
        $data = [];
        if($request->id){
            $data['id'] = $request->id;
        }
        if($request->post_content){
            $data['pc'] = $request->post_content;
        }
        if($request->likes_count){
            $data['likes_count'] = $request->likes_count;
        }
        if($request->comments_count){
            $data['comments_count'] = $request->comments_count;
        }
        if(!empty($data)){
            session(['indexAction' => $data]);
        }
        return redirect('dash');
    }
    public function index()
    {
        if(session()->has('indexAction')){
            $table = \App\Post::paginate(2);
        } else {
            $table = \App\Post::paginate(2);
        }
        return view("index", array('table' => $table));
    }
    public function indexAction(Request $request)
    {
        $data = [];
        if($request->id){
            $data['id'] = $request->id;
        }
        if($request->post_content){
            $data['pc'] = $request->post_content;
        }
        if($request->likes_count){
            $data['likes_count'] = $request->likes_count;
        }
        if($request->comments_count){
            $data['comments_count'] = $request->comments_count;
        }
        if(!empty($data)){
            session(['indexAction' => $data]);
        }
        return redirect('dash');
    }
}