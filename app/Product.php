<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function order()
    {
        return $this->hasMany('App\Order');
    }
    public function setSkuAttribute($value)
    {
        $this->attributes['sku'] = strtoupper($value);
    }
}
