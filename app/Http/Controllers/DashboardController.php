<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	$data = \App\Order::orderDashboard();
    	return view('dashboard', [ 'table' => $data ]);
    }
    public function dashboardAction()
    {
    	var_dump($_POST);
    	exit();
    	return redirect()->back();
    }
    public function dashboardOptions(Request $request)
    {
    	$this->validate($request, array(
    		'id.*' => 'required|integer'
    	));
    	$query = \App\Order::inward_orders($request->id);
    	if(!$query){
    		echo json_encode(array('error' => "Something went wrong!\nPlease Try Again!"));
    		exit();
    	}
    	echo json_encode(array('success' => "Order Inwarded Successfully!"));
    }
}
