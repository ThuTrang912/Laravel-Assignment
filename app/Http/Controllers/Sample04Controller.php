<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sample04Request;

class Sample04Controller extends Controller
{
    //indexメソッド
    public function index(){
        return view('sample04');
    }
    //postメソッド
    public function post(Sample04Request $request){
        $request->session()->regenerateToken();
        $request->validate(
            [
                'name' => ['required'],
                'email' => ['required', 'email'],
            ]
        );
        return view('sample04', );
    }
}
