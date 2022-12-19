@extends('main.layouts.main')

@section('title')
    <title>Categories</title>
@endsection

@section('content')

    <div>
        <h2 class="text-center mt-5">Select posts by categories</h2>
    </div>

    <main class="blog">
        <div class="container">
            <section class="featured-posts-section mt-5 mb-5">
                @foreach($categories as $category)
                    <div class="row btn btn-success text-center mb-3 ml-3 col-3 " >
                        <ul>
                            <a class="text-white text-center" href="{{route('main.category.posts', $category->id)}}"><p>{{$category->id}})
                                    {{$category->title_category}}</p></a>
                        </ul>
                    </div>
                @endforeach
            </section>
        </div>
    </main>
@endsection
