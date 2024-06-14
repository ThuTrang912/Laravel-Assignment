@extends('layouts.kadai')

@section('pageTitle', 'kadai09_1')
@section('title', 'EloquentORM 挿入')
@section('content')
    <section>
        <section>
            <form action="{{ route('kadai06_1.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="bg-white hover:bg-white p-5 mb-10 rounded-md shadow-md">
                    <div class="my-5 px-5 py-2 border-b">
                        <label class="block text-gray-500 text-sm uppercase" for="title">title</label>
                        <input type="text" name="title" id="title"
                            class="w-full text-2xl font-bold leading-10 border border-gray-300 rounded-md"
                            value={{ $article->title }}>
                        @error('title')
                            <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-between py-3">
                        {{-- <div class="w-4/12 mr-5">
                            <label class="block text-gray-500 text-sm uppercase" for="image">image file</label>
                            <!-- サムネイル画像が設定されている場合 -->
                            @if ($article->thumbnails->count() > 0)
                                @if ($article->thumbnails[0]->name !== '')
                                    <figure class="flex flex-col border border-gray-300 rounded-md ">
                                        <img src="{{ asset('storage/thumbnailsFile/' . $article->thumbnails[0]->name) }}"
                                            class="w-full">
                                        <input type="file" name="image" id="image"
                                            class="w-full h-80 text-lg px-3 py-2 resize-none" value="">
                                        @error('image')
                                            <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                                        @enderror
                                    </figure>
                                @endif
                                <!-- サムネイル画像が設定されていない場合 -->
                            @else
                                <figure class="flex flex-col border border-gray-300 rounded-md ">
                                    <input type="file" name="image" id="image"
                                        class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none"
                                        value="">
                                    @error('image')
                                        <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                                    @enderror
                                </figure>
                            @endif
                        </div> --}}
                        <div class="w-4/12 mr-5">
                            <label class="block text-gray-500 text-sm uppercase" for="image">image file</label>
                            <figure class="flex flex-col border border-gray-300 rounded-md ">
                                @if ($article->thumbnails->count() > 0 && $article->thumbnails[0]->name !== '')
                                    <img src="{{ asset('storage/thumbnailsFile/' . $article->thumbnails[0]->name) }}"
                                        class="w-full">
                                @endif
                                <input type="file" name="image" id="image"
                                    class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none"
                                    value="">
                                @error('image')
                                    <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                                @enderror
                            </figure>
                        </div>

                        <div class="grow">
                            <label class="block text-gray-500 text-sm uppercase" for="body">body</label>
                            <textarea name="body" id="body"
                                class="w-full h-80 text-lg px-3 py-2 border border-gray-300 rounded-md resize-none">{{ $article->body }}</textarea>
                            @error('body')
                                <p class="text-sm text-red-600 my-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="grow">
                            <input type="file" name="image_file">
                            <br>
                            <p>
                                @error('image_file')
                                <p class="text-xs text-pink-600">{{ $message }}</p>
                            @enderror
                            </p>
                        </div> --}}
                </div>

                <div class="flex justify-end">
                    <a href={{ route('kadai06_1.index') }}
                        class="block w-16 text-white text-center bg-gray-500 hover:bg-gray-400 mr-5 px-3 py-2 rounded-md">戻る</a>
                    {{-- <form action={{ route('kadai06_1.show', $id) }} method="POST">
                            @method('PUT')
                            <button type="submit">更新</button>
                        </form> --}}
                    <button type="submit"
                        class="block w-16 text-white text-center bg-green-500 hover:bg-green-400 mr-5 px-3 py-2 rounded-md">更新</button>
                </div>
            </form>
        </section>
    </section>
@endsection
