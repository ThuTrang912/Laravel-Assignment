@extends('layouts.kadai')
@section('pageTitle', 'kadai04_2')
@section('content')
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">質問の投稿</h3>
    <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">
        <form action='kadai04_1' method='post'>
            <div class="flex flex-col w-full lg:w-6/12 mr-5">
                <div class="flex flex-col w-full mb-5">
                    <label for="name">名前</label>
                    <p>{{ $result['name'] }}</p>
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label for="student_id">学籍番号</label>
                    <p>{{ $result['student_id'] }}</p>
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label for="email">メールアドレス</label>
                    <p>{{ $result['email'] }}</p>
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label for="course">コースの選択:</label>
                    <p>{{ $courses[$result['course'] - 1]['name'] }}</p>
                </div>
            </div>
            <div class="flex flex-col items-stretch flex-grow">
                <label for="note">メッセージ:</label>
                <p>{{ $result['note'] }}</p>
            </div>
    </div>
    <div class="flex justify-end">
        <button type="submit">送信</button>
    </div>
    </form>
    </div>
@endsection
