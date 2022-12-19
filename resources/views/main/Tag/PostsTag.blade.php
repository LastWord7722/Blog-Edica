@extends('main.layouts.main')

@section('title')
    <title> Posts </title>
@endsection

@section('content')
    <main class="blog">
        <div class="container">
            <div>
                <h3 class="text-center mt-4" data-aos="fade-up">Posts from the tags :</h3>
                <h5 class="text-center"> {{$tag->title}}</h5>
            </div>
            <section class="featured-posts-section mt-5">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{url ('storage/' . $post->preview_image ) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category"> {{$post -> created_at}} </p>
                            <p class="blog-post-category">{{$post->category->title_category}}</p>

                            <p class="blog-post-category"><i
                                    class="fa-solid fa-heart text-danger"> </i> {{$post->LikesPost->count()}} <i
                                    class="fa-solid fa-comment-dots text-success"></i>  {{$post->comment->count()}}</p>

                            <a href="{{route('main.show', $post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title ">{!! $post->title !!}</h6>
                            </a>
                        </div>
                @endforeach
            </section>
            <div>
                <h6>  {{$posts -> links('vendor.pagination.bootstrap-4')}} </h6>
            </div>
        </div>
    </main>
@endsection
