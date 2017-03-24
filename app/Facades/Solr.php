<?php

namespace App\Facades;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Config;
use Solarium\Core\Client\Client;

class Solr {
	public static function paginate($core, $options = [])
	{
		if(!isset($options['per_page'])){
			$options['per_page'] = 3;
		}
		$page_no = 1;
		if(\Illuminate\Support\Facades\Input::has('page')){
            $page_no = \Illuminate\Support\Facades\Input::get('page');
        }
        $configSolr = Config::get($core);
        $client = new Client($configSolr);
        $query = $client->createSelect();
        $query->setStart(($page_no-1)*$options['per_page']);
        $query->setRows($options['per_page']);
        $resultset = $client->select($query);
        $paginator = new Paginator($resultset, $resultset->getNumFound(), $options['per_page'], $page_no, [
            'path'  => request()->url(),
            'query' => request()->query()
        ]);
        return $paginator;
	}
}