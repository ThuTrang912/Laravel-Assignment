<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kadai04Request;

class Kadai04_1Controller extends Controller
{
    public function index(){
        $courses = [
            [
                'id' => 1,
                'name' => 'IT開発エキスパート',
            ],
            [
                'id' => 2,
                'name' => 'IT開発研究',
            ],
            [
                'id' => 3,
                'name' => 'システムエンジニア',
            ],
            [
                'id' => 4,
                'name' => 'Webデザイン',
            ],
        ];
        return view('kadai04_1', ['courses' => $courses]);
    }

    public function post(Kadai04Request $request){
        $request->session()->regenerateToken();
        $result = $request->validated();
        $courses = [
            [
                'id' => 1,
                'name' => 'IT開発エキスパート',
            ],
            [
                'id' => 2,
                'name' => 'IT開発研究',
            ],
            [
                'id' => 3,
                'name' => 'システムエンジニア',
            ],
            [
                'id' => 4,
                'name' => 'Webデザイン',
            ],
        ];
        return view('kadai04_2', compact('result', 'courses'));
    }
}
