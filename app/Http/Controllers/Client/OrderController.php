<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('website.client.order.index');
    }

    public function details()
    {
        return view('website.client.order.details');
    }
}