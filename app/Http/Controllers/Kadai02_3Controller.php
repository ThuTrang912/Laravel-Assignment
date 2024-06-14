<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_3Controller extends Controller
{
    //
    function index()
    {
        $courses = [
            [
            'name' => "IT開発エキスパートコース",
            'note' => "システム開発やサーバ管理に加え、ネットワーク設計、情報セキュリティなど、スペシャリストになるために必要なスキルを幅広く学習できます。",
            'url' => "https://comp.ecc.ac.jp/course_2022/it_coll/col_info/expert/",
            ],
            [
            'name' => "IT開発研究コース",
            'note' => "システム・データベースなど開発技術を深く学ぶ⼀⽅、ネットワークスキルやインフラの構築・設計をマスター。",
            'url' => "https://comp.ecc.ac.jp/course_2022/it_coll/col_info/kenkyu/",
            ],
            [
            'name' => "システムエンジニアコース",
            'note' => "プログラミング⾔語やシステム開発、データベース開発などシステムエンジニアの基礎となるスキルを集中的に学習。",
            'url' => "https://comp.ecc.ac.jp/course_2022/it_coll/col_info/se/",
            ],
            [
            'name' => "Webデザインコース",
            'note' => "デザインの基礎からWeb制作の全⼯程までを学び、クライアントの問題をWebデザインで解決する能⼒を習得。",
            'url' => "https://comp.ecc.ac.jp/course_2022/it_coll/col_info/design/",
            ],
            ];
        return view('kadai02_3', ['courses' => $courses]);
    }
}
