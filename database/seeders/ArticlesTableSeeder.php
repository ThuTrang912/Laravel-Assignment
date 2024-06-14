<?php

namespace Database\Seeders;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::transaction(function(){
            // Article::insert([
            //     [
            //         'title' => 'Global Education Awards',
            //         'body' => 'ECCコンピュータ専⾨学校をはじめ、姉妹校であるECC国際外語専⾨学校、ECCアーティスト美容専⾨学校の学⽣が集結し、「⼭⼝学園の“Global Education”を通じて得た考えや⾃⼰成⻑などについて語る・伝える・共有する」をテーマに想'
            //     ],
            //     [
            //         'title' => '地球祭が今年も開催！！',
            //         'body' => '12⽉17⽇に地球祭（学園祭）が⾏われました。毎年３校合同で開催される年末の⼀⼤⾏事ですが、感染対策のため昨年と今年は各校別々で⾏っています。'
            //     ],
            //     [
            //         'title' => ' 「ハロウィンDay」でした。',
            //         'body' => '10/29（⾦）恒例の「ハロウィン」が⾏われました。今年も学⽣会による校舎の飾りつけや仮装で在校⽣を楽しませてくれました。'
            //     ],
            //     [
            //         'title' => '2年ぶりに「留学⽣交流会」を開催しました！',
            //         'body' => 'コロナの影響で中⽌していた「留学⽣交流会」を2年ぶりに実施しましたその様⼦をお伝えします。',
            //     ],
            // ]);

            // モデルファクトリーを利⽤したテストデータの挿⼊（100件分）
            Article::factory()->count( 100 )->create();
        });


    }
}
