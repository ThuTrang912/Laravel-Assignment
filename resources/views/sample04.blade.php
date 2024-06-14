@extends('layouts.kadai')
@section('pageTitle', 'sample04')
@section('content')

    <form action="sample04" method="POST">
        @csrf
        <div>
            <label for="user_name">名前</label>
            <input type="text" id="user_name" name="user_name" value="{{ old('name') }}">
            @error('name')
                <p class="text-xs text-pink-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="text-xs text-pink-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"> 送信 </button>
    </form>
@endsection
