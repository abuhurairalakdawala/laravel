<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;
use Solarium\Core\Client\Client;
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
    	// return view('dashboard', [ 'table' => $data ]);
        $configSolr = Config::get('solr.demos'); 
        $client = new Client($configSolr);
        $query = $client->createSelect();
        $query->setStart(0);
        $query->setRows(1);
        $query->addSort('id', 'desc');
        $query->setFields('id,firstname');
        $query->setQuery('*a*', 'firstname');
        $hl = $query->getHighlighting();
        $hl->setFields(array('firstname'));
        // $dismax = $query->getDisMax();
        // $dismax->setQueryFields('firstname');
        $resultset = $client->select($query);
        // var_dump( $resultset->getNumFound() );
        // var_dump( $resultset );
        // try {
        //     $query->setQuery('firstname:*a*');
            // $query->addSortField('id', \SolrQuery::ORDER_DESC);
            // var_dump($resultset->getNumFound());
            // var_dump($resultset);
            // $dismax = $query->getDisMax();
            // var_dump($dismax);
            foreach ($resultset as $highlight) {
                var_dump($highlight);
            }
        // } catch (Solarium_Exception $e) {
        //     echo 'Ping query failed';
        // }
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
