<?php

namespace App\Http\Controllers\My;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MyDash extends Controller
{
    public function dashb()
    {
        $filter = array();
        if(session()->has('403cfa')) {
            $filter = session('403cfa');
        }
        $name_dd = \App\Customer::select('id','customer_name')->get();
        return view("dashb", [ 'name_dd' => $name_dd, 'filter' => $filter ]);
    }
    public function req(Request $request){
        $data = [];
        if($request->id){
            $data['id'] = $request->id;
        }
        if($request->name){
            $data['name'] = $request->name;
        }
        if($request->date_from){
            $data['date_from'] = $request->date_from;
        }
        if($request->date_to){
            $data['date_to'] = $request->date_to;
        }
        session([ '403cfa' => $data ]);
        return redirect()->back();
    }
}