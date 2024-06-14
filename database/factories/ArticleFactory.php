<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // "title" => "サンプルのタイトル",
            // "body" => "サンプルの投稿内容。",
            "title" => $this->faker->realText( 20 ),
            "body" => $this->faker->realText( 200 ),
            "created_at" => $this->faker->dateTime( "now" ),
        ];
    }
}
