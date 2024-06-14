@extends('layouts.kadai')
@section('pageTitle', 'kadai06_1')
@section('title', 'EloquentORM 参照')
@section('content')
    <div class="flex justify-end mb-10">
        <a href="{{ route('kadai06_1.create') }}"
            class="block w-24 text-white text-center bg-sky-600 hover:bg-sky-500 px-3 py-2 rounded-md">新規投稿</a>
    </div>
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-10">
        @foreach ($articles as $article)
            <article
                class="row-span-2 bg-white hover:bg-white rounded-md shadow-md hover:shadow-lg transition-shadow overflow-hidden">
                <a href="{{ route('kadai06_1.show', $article->id) }}" class="block w-full h-full">
                    {{-- <figure class="h-48 overflow-hidden">
                        @foreach ($article->thumbnails as $thumbnail)
                            @if ($loop->first)
                                <img src="{{ asset('storage/thumbnailsFile/' . $thumbnail->name) }}"
                                    class="w-full h-full object-cover object-top">
                            @endif
                        @endforeach
                    </figure> --}}
                    @if ($article->thumbnails !== null && $article->thumbnails->count() > 0)
                        @if (isset($article->thumbnails[0]->name) && !empty($article->thumbnails[0]->name))
                            <figure class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/thumbnailsFile/' . $article->thumbnails[0]->name) }}"
                                    class="w-full h-full object-cover object-top">
                            </figure>
                        @else
                            <figure class="h-48 overflow-hidden">
                                <div class="w-full h-full object-cover object-top"></div>
                            </figure>
                        @endif
                    @else
                        <figure class="h-48 overflow-hidden">
                            <div class="w-full h-full object-cover object-top"></div>
                        </figure>
                    @endif



                    <h3 class="font-bold mt-5 mb-2 px-2"><b>{{ $article->title }}</b></h3>
                    <p class="text-gray-400 text-xs mb-5 px-2"><time datetime="投稿記事の⽇時">{{ $article->created_at }}</time>
                    </p>
                </a>
            </article>
        @endforeach
    </section>
    <div class="mt-10">
        {{ $articles->links() }}
    </div>
@endsection
