@extends('main.layouts.main')
@section('title')
    <title>{{$post->title}}</title>
@endsection
@section('content')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{$post->created_at}}</p>
            <p class="edica-blog-post-meta"><a
                        href="{{route('main.category.posts',$post->category_id)}}">{{$post->category->title_category}}</a>
            </p>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> Tags:
                @foreach($post->tag as $oneTags)

                    <a href="{{route('main.tag.posts',$oneTags->id)}}"> < {{$oneTags->title}} ></a>
                @endforeach</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{url ('storage/' . $post->main_image ) }}" alt="featured image" class="w-100 h-25">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!!$post->content!!}</p>
                    </div>
                </div>
            </section>
            <form action="{{route('likes.main.store', $post->id)}}" method="post">
                @csrf
                <button type="submit" class="border-0 bg-transparent d-flex justify-content-between">
                    @auth()
                        @if(auth()->user()->LikedPosts->contains($post->id))
                            <i class="fas fa-heart text-danger"> {{$post->LikesPost->count()}} </i>
                        @else
                            <i class="far fa-heart"> {{$post->LikesPost->count()}} </i>
                        @endif
                    @endauth
                </button>
            </form>
            @guest()
                <i class="far fa-heart"> {{$post->LikesPost->count()}} </i>
            @endguest
        </div>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                    <div class="row">
                        @foreach($randomPost as $random)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{url ('storage/' . $random->preview_image ) }}" alt="related post"
                                     class="post-thumbnail">
                                <p class="post-category">{{$random->created_at}}</p>
                                <p class="post-category">{{$random->category->title_category}}</p>
                                <a href="{{route('main.show', $random->id)}}"><h5
                                            class="post-title">{{$random->title}} </h5></a>
                            </div>
                    @endforeach
                </section>
                @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Comment</h2>
                        <form action="{{route('comment.main.store', $post->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Comment"
                                              rows="10">Comment</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                @endauth
                @guest()
                    <div class="text-center mb-5">
                        <h5>If you want to leave a comment please login </h5>
                        <a href="{{route('login')}}" class="h4 btn btn-warning text-white "> Login </a>
                    </div>
                @endguest
                <div class="widget-user-header bg-warning   text-white text-center mb-4 h-7">
                    <h4>All comments: {{$post->UserComment->count()}} </h4>
                    <p></p>
                </div>
                @foreach($post->UserComment as  $comment)
                    <div class="card card-primary card-outline border border-warning">
                        <div class="card-header">
                            <h6 class="card-title m-0 text-dark "> {{$comment->name}}</h6>
                            <p class="blog-post-category"> {{$comment -> DataAsCarbon->diffForHumans()}} </p>
                            <div class="d-flex justify-content-end">
                                @if($comment->user_id == auth()->user()->id)
                                    <div class="d-flex justify-content-end">
                                        <form action="{{route('comment.main.destroy',$comment->id)}}" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class="text-white btn btn-danger"> Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">{{$comment->message}}</h6>
                        </div>
                    </div>
                    <p></p>
                @endforeach
            </div>
        </div>
        </div>
    </main>
@endsection
