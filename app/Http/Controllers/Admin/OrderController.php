<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function showOrder(){
        return view('Admin.Pages.Order.Index');
    }
}
