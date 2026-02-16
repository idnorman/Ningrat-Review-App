<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function showTransaction(){
        return view('Admin.Pages.Transaction');
    }
}
