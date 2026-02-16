<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function showDashboard()
    {
        return view('Admin.Pages.Dashboard');
    }
    
    function showCustomer()
    {
        return view('Admin.Pages.Customer.Index');
    }

    function showContact()
    {
        return view('Admin.Pages.Contract.Index');
    }
}
