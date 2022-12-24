@extends('main.layouts.main')
@section('title')
    <title> Home :: Edica </title>
@endsection
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title " data-aos="fade-up"> </h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $k=>$post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{url ('storage/' . $post->preview_image ) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category"> {{$post -> created_at}} </p>
                            <p class="blog-post-category">{{$post->category->title_category}}</p>

                                <p class="blog-post-category"><i
                                        class="fa-solid fa-heart text-danger"> </i> {{$post->users_likd_more_post_count}} <i
                                        class="fa-solid fa-comment-dots text-success"></i>  {{$post->comment_count}}</p>

                            <a href="{{route('main.show', $post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title ">{!! $post->title !!}</h6>
                            </a>
                        </div>
                    @endforeach

                    <div>
                       <h6> {{$posts -> links('vendor.pagination.bootstrap-4')}} </h6>
                    </div>
                </div>

            </section>
            <h1 class="edica-page-title" data-aos="fade-up">Popular posts</h1>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($postMoreLiked as $k=>$post)
                                <div class="col-md-6 blog-post aos-init aos-animate" data-aos="fade-right">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{url ('storage/' . $post->preview_image ) }}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category"> {{$post -> created_at}} </p>
                                    <p class="blog-post-category">{{$post->category->title_category}}</p>
                                    <p class="blog-post-category"><i
                                            class="fa-solid fa-heart text-danger"></i> {{$post->users_likd_more_post_count}}
                                        <i
                                            class="fa-solid fa-comment-dots text-success"></i> {{$post->comment_count}}</p>
                                    <a href="{{route('main.show', $post->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{!! $post->title !!}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title ">Most Discussed Post</h5>
                        <div class="post-carousel">
                                <div class="carousel-inner" role="listbox">

                                    <figure class="carousel-item active">
                                        <img src="{{url ('storage/' . $DiscussedPost->preview_image ) }}"
                                             alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="{{route('main.show', $DiscussedPost->id)}}"> {{$DiscussedPost->title}} <i
                                                    class="fa-solid fa-heart text-danger"></i> {{$DiscussedPost->users_likd_more_post_count}}
                                               <i
                                                    class="fa-solid fa-comment-dots text-success"></i> {{$DiscussedPost->comment_count}}
                                                </a>
                                        </figcaption>
                                    </figure>
                                </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title text-center">Top Five Categories</h5>
                        @foreach($fivePopularCategories as $topCategory)

                            <a href="{{route('main.category.posts', $topCategory->id)}}">
                                <p class="btn-success text-center rounded-pill">  {{$topCategory->title_category}} </p> </a>
                        @endforeach
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Random posts</h5>
                        @foreach($postRandom as $k=>$post)
                            <ul class="post-list">
                                <li class="post">
                                    <a href="{{route('main.show', $post->id)}}" class="post-permalink media">
                                        <img src="{{url ('storage/' . $post->preview_image ) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$post->title}}</h6>

                                            <p class="blog-post-category"><i
                                                    class="fa-solid fa-heart text-danger"></i> {{$post->users_likd_more_post_count}}
                                                <i
                                                    class="fa-solid fa-comment-dots text-success"></i>  {{$post->comment_count}}</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
