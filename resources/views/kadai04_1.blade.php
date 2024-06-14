@extends('layouts.kadai')
@section('pageTitle', 'kadai04_1')
@section('content')
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">質問の投稿</h3>
    <div class="flex justify-between flex-col lg:flex-row items-stretch mb-5">
        <form action="/kadai04_1" method="POST">
            <div class="flex flex-col w-full lg:w-6/12 mr-5">
                @csrf
                <div class="flex flex-col w-full mb-5">
                    <label for="name">名前</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="ECC 太郎">
                    @error('name')
                        <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label for="student_id">学籍番号</label>
                    <input type="text" id="student_id" name="student_id" value="{{ old('student_id') }}"
                        placeholder="22200**">
                    @error('student_id')
                        <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label for="email">メールアドレス</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        placeholder="example@ecc.com">
                    @error('email')
                        <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-5">
                    <label for="course">コースの選択:</label>
                    <select id="course" name="course">
                        @foreach ($courses as $course)
                            <option value={{ $course['id'] }}>{{ $course['name'] }}</option>
                        @endforeach
                    </select>
                    @error('course')
                        <p class="text-xs text-pink-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-col items-stretch flex-grow">
                <label for="note">メッセージ:</label>
                <textarea id="note" name="note"></textarea>
            </div>
    </div>
    <div class="flex justify-end">
        <button type="submit">送信</button>
    </div>
    </form>
    </div>
@endsection
