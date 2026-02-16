<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mst_param;

class ParamController extends Controller
{
    public function showParameter()
    {
        $data = mst_param::all();
        return view('Admin.Pages.Master.Parameter', compact('data'));
    }
}
