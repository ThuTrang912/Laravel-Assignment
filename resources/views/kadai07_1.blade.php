@extends('layouts.kadai')

@section('pageTitle', 'kadai07_1')
@section('title', 'EloquentORM 条件を使った参照')
@section('content')
    <section>
        <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
            <h3 class="text-2xl font-bold leading-10 my-5 px-5 py-2 border-b">{{ $article->title }}</h3>
            <p class="text-gray-400 text-sm text-right px-3"><time datetime="投稿記事の⽇時">{{ $article->created_at }}</time></p>

            @if ($article->thumbnails !== null && $article->thumbnails->count() > 0)
                @if (isset($article->thumbnails[0]->name) && !empty($article->thumbnails[0]->name))
                    <div class="flex justify-between py-3">
                        <figure class="flex flex-col w-4/12">
                            <img src="{{ asset('storage/thumbnailsFile/' . $article->thumbnails[0]->name) }}"
                                class="w-full mb-5">
                        </figure>
                        <p class="w-8/12 text-lg leading-loose px-3 py-5">{{ $article->body }}</p>
                    </div>
                @else
                    <div class="flex justify-between py-3">
                        <p class="w-full text-lg leading-loose px-3 py-5">{{ $article->body }}</p>
                    </div>
                @endif
            @else
                <div class="flex justify-between py-3">
                    <p class="w-full text-lg leading-loose px-3 py-5">{{ $article->body }}</p>
                </div>
            @endif





            {{-- <div class="flex justify-between py-3">
                <figure class="flex flex-col w-4/12">
                    @foreach ($article->thumbnails as $thumbnail)
                        @if ($loop->first)
                            <img src="{{ asset('storage/thumbnailsFile/' . $thumbnail->name) }}" class="w-full mb-5">
                        @endif
                    @endforeach
                </figure>
                <p class="grow w-8/12 text-lg leading-loose px-3 py-5">{{ $article->body }}</p>
            </div> --}}
        </div>
        <div class="flex justify-end">
            <a href="{{ route('kadai06_1.index') }}"
                class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
            <form action="{{ route('kadai06_1.destroy', $article->id) }}" method="POST"
                class="block w-16 text-white text-center bg-red-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md">
                @method('DELETE')
                @csrf
                <button type="submit">削除</button>
            </form>
            <a href="{{ route('kadai06_1.edit', $article->id) }}"
                class="block w-16 text-white text-center bg-pink-500 hover:bg-pink-400 mr-5 px-3 py-2 rounded-md">編集</a>

        </div>
    </section>


@endsection
