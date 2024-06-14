@extends('layouts.kadai')
@section('pageTitle', 'kadai05_1')
@section('title', 'ファイルのアップロード')
@section('content')
    <form action="kadai05_1" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <input type="file" name="image_file">
        <br>
        <p>
            @error('image_file')
            <p class="text-xs text-pink-600">{{ $message }}</p>
        @enderror
        </p>
        <br>
        <input type="submit" name="sub" value="送信"
            style="background-color: blue; color: white;
            width:50px;height:30px;">
    </form>
@endsection
