<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai03_1Controller extends Controller
{
    //
    function index(){
        $collages = [
                [
                    'id' => 1,
                    'name' => "ゲーム・クリエイティブカレッジ",
                    'course' => [
                    "ゲーム開発エキスパートコース",
                    "ゲームプログラム開発コース",
                    "CGデザインコース",
                    ],
                    'url' => "https://comp.ecc.ac.jp/course_2024/game_coll/",
                ],
                [
                    'id' => 2,
                    'name' => "ITカレッジ",
                    'course' => [
                    "IT開発エキスパートコース",
                    "IT開発研究コース",
                    "Webデザインコース",
                    "システムエンジニアコース",
                ],
                'url' => "https://comp.ecc.ac.jp/course_2024/it_coll/",
            ]
        ];
        return view('kadai03_1', ['collages' => $collages]);

    }
}
