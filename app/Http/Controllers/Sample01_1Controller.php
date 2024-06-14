<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sample01_1Controller extends Controller
{
    //
    public function index() {
        //return view('sample01_1');
        $message = "変数messageの値です。";
        $comment = "変数commentの値です。";
        return view('sample01_1', compact('message','comment'));

        //return view('sample01_1', ['aaa' => $message, 'bbb' => "bbbの値"]);
    }
}
