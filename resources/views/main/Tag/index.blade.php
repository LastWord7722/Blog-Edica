@extends('main.layouts.main')

@section('title')
    <title>Tags</title>
@endsection

@section('content')
    <div>
        <h2 class="text-center mt-5">Select posts by tags</h2>
    </div>
    <main class="blog">
        <div class="container">
            <section class="featured-posts-section mt-5 mb-5">
                @foreach($tags as $tag)
                    <div class="row btn btn-warning text-center mb-3 ml-3 col-3 " >
                        <ul>
                            <a class="text-white text-center" href="{{route('main.tag.posts', $tag->id)}}"><p>{{$tag->id}})
                                    {{$tag->title}}</p></a>
                        </ul>
                    </div>
                @endforeach
            </section>
        </div>
    </main>
@endsection
