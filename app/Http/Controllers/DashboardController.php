<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = Redis::exists('user:1s');
        // var_dump($user);
        // $user = Redis::get('user:1');
        // var_dump($user);
        // $orders = \App\Order::get();
        // foreach ($orders as $key => $order) {
        //     var_dump($order->product()->select('id')->first()->id );
        // }
        // return( $order->product );
        \App\Facades\HtmlTags::setTitle('OFT Dashboard');
    	$data = \App\Order::orderDashboard();
    	return view('dashboard', [ 'table' => $data ]);
    }
    public function dashboardAction()
    {
    	var_dump($_POST);
    	exit();
    	return redirect()->back();
    }
    public function downloadOrders(Request $request)
    {
        $this->validate($request, array(
            'id.*' => 'required|integer'
        ));
        $handle = fopen('export.csv', 'w');
        $data = "Content";
        fwrite($handle, $data);
        fclose($handle);
        return json_encode(array('file'=>'export.csv'));
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
