@extends('layouts.kadai')
@section('pageTitle', 'kadai05_2')
@section('title', 'アップロードされたファイル')
@section('content')
    {{-- {{ dd(asset('storage/' . $images)) }} --}}
    <p>
        {{-- <img src="{{ asset('storage/' . $images) }}" alt="アップロードした画像表示される" style="width:30%;height:30%;"> --}}
        <img src="http://10.201.10.38/~sk2a/2220047/{{ $images }}" alt="アップロードした画像表示される" style="width:30%;height:30%;">

    </p>
    <br>
    <br>
    <a href="">戻る</a>


@endsection
