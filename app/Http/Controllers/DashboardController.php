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
     //    \App\Facades\HtmlTags::setTitle('OFT Dashboard');
    	// $data = \App\Order::orderDashboard();
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
    	// return view('dashboard', [ 'table' => $data ]);
        $data = \App\Facades\Solr::paginate('solr.demos');
        return view('solr', [ 'data' => $data ]);

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
