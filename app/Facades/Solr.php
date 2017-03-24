<?php

namespace App\Facades;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Config;
use Solarium\Core\Client\Client;
use Illuminate\Support\Facades\Facade;

class Solr extends Facade {
	public $client;
	public function __construct($core)
	{
		$this->client = new Client(Config::get('solr.'.$core));
	}
	public function paginate($options = [])
	{
		if(!isset($options['per_page'])){
			$options['per_page'] = 3;
		}
		$page_no = 1;
		if(\Illuminate\Support\Facades\Input::has('page')){
            $page_no = \Illuminate\Support\Facades\Input::get('page');
        }
        $query = $this->client->createSelect();
        $query->setStart(($page_no-1)*$options['per_page']);
        $query->setRows($options['per_page']);
        $resultset = $this->client->select($query);
        $paginator = new Paginator($resultset, $resultset->getNumFound(), $options['per_page'], $page_no, [
            'path'  => request()->url(),
            'query' => request()->query()
        ]);
        return $paginator;
	}
	public function addDocuments(array $documents)
	{
		$update = $this->client->createUpdate();
		$docs = array();
		foreach ($documents as $key => $document) {
			$doc = $update->createDocument();
			$keys = array_keys($document);
			foreach ($keys as $doc_key) {
				$doc->$doc_key = $document[$doc_key];
			}
			unset($doc_key);
			$docs[] = $doc;
		}
		unset($document);
		return $this->commitDocument($update,$docs);
	}
	public function addDocument(array $document)
	{
		$update = $this->client->createUpdate();
		$doc = $update->createDocument();
		$keys = array_keys($document);
		foreach ($keys as $doc_key) {
			$doc->$doc_key = $document[$doc_key];
		}
		unset($doc_key);
		return $this->commitDocument($update,array($doc));
	}
	public function commitDocument($update,$docs)
	{
		$update->addDocuments($docs);
		$update->addCommit();
		$result = $this->client->update($update);
		$status = $result->getStatus();
		return ($status === 0) ? true : false;
	}
}