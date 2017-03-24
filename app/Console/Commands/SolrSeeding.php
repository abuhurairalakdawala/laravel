<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SolrSeeding extends Command
{
    protected $signature = 'solr:seed {collection_name}';
    protected $description = 'Populate Solr Data in Solr Collections Using Fakers.';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $collection_name = $this->argument('collection_name');
        $this->info('Seeding Started!');
        $solr = new \App\Facades\Solr($collection_name);
        $factory = new \App\Helpers\SolrSeedFactory();
        $solrData = $factory->seed($collection_name);
        if(!empty($solrData)){
            $add = $solr->addDocuments($solrData);
        } else {
            $this->error('Something Went Wrong!');
            $this->error('Check Your Collection Name!');
            exit();
        }
        if($add){
            $this->info('Data Added Successfuly!');
        } else {
            $this->error('Something Went Wrong!');
            $this->error('Please Try Again!');
        }
    }
}
