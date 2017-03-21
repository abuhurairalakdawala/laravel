<?php

namespace App\Http\Controllers\My;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyDash extends Controller
{
    public function dashb()
    {
        return view("dashb");
    }
}