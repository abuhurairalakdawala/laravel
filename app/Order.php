<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function order_status()
    {
        return $this->belongsTo('App\OrderStatus', 'status_id');
    }
    public static function scopeorderDashboard($query,$page=5)
    {
        $return = $query->with(
            [
                'product' => function($query){
                            $query->select('id','sku','product_name')->latest('id');
                    },
                'customer' => function($query){
                            $query->select('id', 'customer_name');
                    },
                'order_status' => function($query){
                            $query->select('id','name');
                }
            ]
        )->select('id', 'product_id', 'customer_id', 'status_id', 'inward_date', 'order_quantity', 'created_at')->latest('id');
        return $return->paginate($page);
    }
    public function scopeinward_orders($query,$ids)
    {
        return $query->whereIn('id', $ids)->update(array('inward_date' => date('Y-m-d H:i:s')));
    }
}
