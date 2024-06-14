<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_2Controller extends Controller
{
    //
    function index()
    {
        $message = "コントローラーからビューへ渡された値。";
        return view('kadai02_2', ['message' => $message]);
    }
}
