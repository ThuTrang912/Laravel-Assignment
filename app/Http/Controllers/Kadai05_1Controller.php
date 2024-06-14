<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kadai05Request;

use Illuminate\Support\Facades\Storage;

class Kadai05_1Controller extends Controller
{
    //
    public function index(){
        return view('kadai05_1');
    }

    public function post(Kadai05Request $request){
        //TODO:画像処理
        $images = $request->file('image_file');
        //TODO:imagesに何にか格納されているか教示ddメソッド使用
        //dd($images);

        //$images = Storage::disk("public")->put( "kadai05_images", $images );

        // FTPでのファイルをアップロード
        $images = Storage::disk("ftp")->put( "public_html/2220047", $images );
        // dd($images);
        $images = basename($images);
        //処理が上手いったら
        //CSRFトークを廃棄
        $request->session()->regenerateToken();
        //$file = $request->file( "image" );

        return view('kadai05_2',compact( "images" ));
        //return view( "kadai05_2", compact( "result" ) );
    }
}
