@extends( 'layouts.kadai' )
@section( 'pageTitle', 'kadai03_1' )
@section( 'content' )
    <section>
        <h3 class="text-3xl font-bold py-5 mb-5 border-b-2 border-black">カレッジ</h3>

        <section class="p-5">
            @foreach ($collages as $collage)
                {{-- @foreach ($collage as $course) --}}
                    <h4 class="text-xl font-bold text-pink-600 mb-2">
                        <a href={{ $collage['url'] }}>{{ $collage['name'] }}</a>
                    </h4>
                    <ul>
                        @foreach($collage['course'] as $course)

                            <li class="mb-2">{{ $course }}</li>
                        @endforeach
                    </ul>
                {{-- @endforeach --}}
            @endforeach
        </section>
    </section>

@endsection
