<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class GuessController extends Controller
{
    function index()
    {
        $data = MenuModel::get();
        return view('Guess.Pages.Home',['data' => $data]);
    }

    function showMenu(){
       
        return view('Guess.Pages.Menu');
    }
}
