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
}
