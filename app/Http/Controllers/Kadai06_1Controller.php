<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Thumbnail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Kadai06_1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    //     //$articleDao = new Article();


    //     // $articles = $articleDao->get();
    //     // $articles = Article::get();

    //     // $articles = Article::paginate( 10 );
    //     // $articles = $articleDao->with('thumbnails')->orderBy("created_at","desc")->paginate( 10 );
    //     $articles = Article::with('thumbnails')->orderBy('created_at', 'desc')->paginate(10);


    //     // return view('kadai06_1', ['articles' => $articles]);

    //     return view('kadai06_1', compact('articles'));
    // }

    public function index()
    {
        // Retrieve articles along with their latest thumbnails
        $articles = Article::with(['thumbnails' => function ($query) {
            $query->latest(); // This will order the thumbnails in descending order based on their created_at column.
        }])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('kadai06_1', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("kadai08_1");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    //hint cho tuần sau：vì save là giống nhau nên lưu đối tượng mới hay thay đổi đối tượng đã có là như nhau nên chỉ thay đổi ở route thôi
    {   //
        $request->session()->regenerateToken();

        // TODO: Articleクラスのインスタンス化
        $articleDao = new Article();
        $thumbnail = new Thumbnail();

        // TODO: Requestのバリデーションチェック（Articleクラスのルールなど使用する）
        $this->validate($request, $articleDao::$rules, $articleDao::$messages);

        // TODO:各リクエストの値インスタンス変数にセットする
        $articleDao->title = $request->input("title");
        $articleDao->body = $request->input("body");

        if ($request->hasFile('image')) {
            $file = $request->file("image");
            $result = Storage::disk("public")->put("thumbnailsFile", $file);
            $file = basename($result);
            //dd($file);
            $thumbnail->name = $file;
            //dd($thumbnail->name);
        } else {
            $thumbnail->name = "";
        }

        //TODO:DBにinsert(トランザクション忘れずに)
        DB::transaction(function () use ($articleDao, $thumbnail) {
            $articleDao->save();
            $thumbnail->article_id = $articleDao->id;
            $thumbnail->save();
        });
        return redirect()->route("kadai06_1.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //$articleDao = new Article();

    //     // nếu không tìm kiếm bằng id thì dùng where như dưới để thay thế
    //     //$article = $articleDao->find( $id );
    //     $article = Article::with('thumbnails')->find($id);

    //     //$article = $articleDao->where(["title" => "Global Education Awards"])->get();
    //     //$article = $articleDao->where(["title" => "Global Education Awards"])->first();
    //     //$article = $articleDao->where(["title", "like", "%Education%"])->first();
    //     // $article_id = $id;
    //     // $article->thumbnail = $thumbnail->find( $article_id );

    //     //return $articleDao->select(["id","title"])->where(["title" => "Sample"])->orderBy("create_at", "desc")->toSql();
    //     return view('kadai07_1',compact('article'));
    // }


    public function show($id)
    {
        $article = Article::with(['thumbnails' => function ($query) {
            $query->latest(); // This will order the thumbnails in descending order based on their created_at column.
        }])->find($id);

        return view('kadai07_1', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    //     $article = Article::with('thumbnails')->find($id);
    //     return view("kadai09_1",compact('article'));
    // }

    public function edit($id)
    {
        //
        $article = Article::with(['thumbnails' => function ($query) {
            $query->latest(); // This will order the thumbnails in descending order based on their created_at column.
        }])->find($id);
        return view("kadai09_1", compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    //     $request->session()->regenerateToken();

    //     $articleDao = new Article();
    //     $thumbnail = new Thumbnail();

    //     $this->validate( $request, $articleDao::$rules, $articleDao::$messages );

    //     if ($request->hasFile('image')) {
    //         $file = $request->file("image");
    //         $result = Storage::disk("public")->put("thumbnailsFile", $file);
    //         $file = basename($result);
    //         $thumbnail->name = $file;
    //     } else {
    //         $existingThumbnail = $thumbnail->where('article_id', $id)->first();
    //         if ($existingThumbnail) {
    //             $thumbnail->name = $existingThumbnail->name;
    //         } else {
    //             $thumbnail->name = ""; // Set a default value or handle the case where the thumbnail doesn't exist.
    //         }
    //     }


    //     DB::transaction(function () use ($articleDao,$thumbnail, $id, $request) {
    //         $article = $articleDao->find($id);
    //         $article->title = $request->input("title");
    //         $article->body = $request->input("body");
    //         $article->save();

    //         if ($request->hasFile('image')) {
    //             $thumbnail->article_id = $article->id;
    //             $thumbnail->save();
    //         }
    //     });
    //     return redirect()->route( "kadai06_1.show", $id );

    // }


    public function update(Request $request, $id)
    {
        $request->session()->regenerateToken();

        $articleDao = Article::findOrFail($id);

        $this->validate($request, Article::$rules, Article::$messages);

        if ($request->hasFile('image')) {
            $file = $request->file("image");
            $result = Storage::disk("public")->put("thumbnailsFile", $file);
            $file = basename($result);
            $thumbnail = new Thumbnail();
            $thumbnail->name = $file;
            $thumbnail->article_id = $articleDao->id;
            $thumbnail->save();
        }

        DB::transaction(function () use ($articleDao, $request) {
            $articleDao->title = $request->input("title");
            $articleDao->body = $request->input("body");
            $articleDao->save();
        });

        return redirect()->route("kadai06_1.show", $id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $articleDao = new Article();
        DB::transaction(function () use ($id) {
            Article::destroy($id);
            Thumbnail::where('article_id', $id)->delete();
        });
        return redirect()->route("kadai06_1.index");
    }
}
