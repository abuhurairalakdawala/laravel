<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Solarium_Exception;

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
        // $page_no = 1;
        // if(\Illuminate\Support\Facades\Input::has('page')){
        //     $page_no = \Illuminate\Support\Facades\Input::get('page');
        // }
        // $perPage = 3;
        // $configSolr = Config::get('solr.demos');
        // $client = new Client($configSolr);
        // $query = $client->createQuery($client::QUERY_SELECT);
        // $resultset = $client->execute($query);
        // $query = $client->createSelect();
        // $query->setFields('id,firstname');
        // $query->addSort('id', $query::SORT_DESC);
        // $query->setStart(($page_no-1)*$perPage);
        // $query->setRows($perPage);
        // $resultset = $client->select($query);
        // var_dump( $resultset->getNumFound() );
        // var_dump( $resultset );
        // $paginator = new Paginator($resultset, $resultset->getNumFound(), $perPage, $page_no, [
        //     'path'  => request()->url(),
        //     'query' => request()->query()
        // ]);
        // var_dump($paginator->items());
        // var_dump($paginator);
        // echo $paginator->links();
        // foreach ($paginator->items() as $document) {
            // var_dump($document);
        // }
        $data = \App\Order::orderDashboard();
        \App\Facades\HtmlTags::setTitle('OFT Dashboard');
        return view('dashboard', [ 'table' => $data ]);
    }
    public function solrDashboard()
    {
        \App\Facades\HtmlTags::setTitle('OFT Dashboard');
        $filter = array();
        if(session()->has('84e656')) {
            $filter = session('84e656');
        }
        $solr = new \App\Facades\Solr('orders');
        $data = $solr->paginate(array('per_page'=>5));
        $order_status_dd = \App\OrderStatus::select('id','name')->get();
        return view('solr', [ 'data' => $data, 'order_status_dd' => $order_status_dd, 'filter' => $filter ]);
    }
    public function dashboardAngular()
    {
        $order_status_dd = \App\OrderStatus::select('id','name')->get();
        \App\Facades\Assets::setJs('dashboard.js');
        // \App\Facades\HtmlTags::setBaseTag('/dashboard_angular/');
        return view('angular_dashboard', [ 'order_status_dd' => $order_status_dd ]);
    }
    public function solrDashboardApi()
    {
        $data = \App\Order::orderDashboard();
        return array('items' => $data->items(), 'links'=>  (string)$data->links());
    }
    public function solrDashboardAction(Request $request){
        $data = [];
        if($request->id){
            $data['id'] = $request->id;
        }
        if($request->product_name){
            $data['product_name'] = $request->product_name;
        }
        if($request->product_sku){
            $data['product_sku'] = $request->product_sku;
        }
        if($request->customer_name){
            $data['customer_name'] = $request->customer_name;
        }
        if($request->order_quantity){
            $data['order_quantity'] = $request->order_quantity;
        }
        if($request->order_status){
            $data['order_status'] = $request->order_status;
        }
        if($request->inward_date_from){
            $data['inward_date_from'] = $request->inward_date_from;
        }
        if($request->inward_date_to){
            $data['inward_date_to'] = $request->inward_date_to;
        }
        if($request->order_date_from){
            $data['order_date_from'] = $request->order_date_from;
        }
        if($request->order_date_to){
            $data['order_date_to'] = $request->order_date_to;
        }
        session([ '84e656' => $data ]);
        return redirect()->back();
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
