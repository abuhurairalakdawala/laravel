<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	$data = \App\Order::with(
    		[
    			'product' => function($query){
                    		$query->select('id','sku','product_name');
                	},
                'customer' => function($query){
                			$query->select('id', 'customer_name');
                	},
                'order_status' => function($query){
                			$query->select('id','name');
                }
    		]
    	)->select('id', 'product_id', 'customer_id', 'status_id', 'inward_date', 'order_quantity', 'created_at')->orderBy('id','DESC')->paginate(5);
    	return view('dashboard', [ 'table' => $data ]);
    }
}
