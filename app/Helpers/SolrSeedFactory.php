<?php

namespace App\Helpers;

class SolrSeedFactory {
	public $min = 51, $max = 60;
	public function seed($collection)
	{
		$faker = \Faker\Factory::create();
		$solrData = array();
		switch ($collection) {
			case 'orders':
				for($i=$this->min; $i<=$this->max; $i++){
		            $solrData[] = array(
		                'id' => $i,
		                'product_name' => $faker->word,
		                'product_sku' => $faker->text(10),
		                'customer_name' => $faker->name,
		                'order_quantity' => $faker->randomDigit,
		                'order_status' => $faker->randomElement(array('Confirmed', 'Shipped', 'Cancelled', 'Refunded', 'Partly Shipped Order Complete', 'Partly Shipped Order In-Complete')),
		                'inward_date' => strtotime($faker->date('Y-m-d H:i:s')),
		                'order_date' => strtotime($faker->date('Y-m-d H:i:s'))
		            );
		        }
				break;
		}
        return $solrData;
	}
}