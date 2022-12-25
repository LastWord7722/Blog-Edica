@extends('personal.layouts.main')
@section('personal_content')

    <section class="content">
        <div class="container-fluid">
            <div class="col-12 text-center">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username"> {{auth()->user()->name}} </h3>
                        <h5 class="widget-user-desc">Users Edica </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{auth()->user()->LikedPosts->count()}}</h5>
                                    <span class="description-text">LIKES</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Edit</h5>
                                    <a href="{{route('personal.home.edit', auth()->user()->id)}}"
                                       class="btn btn-primary col-2"> Go !</a>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">{{$comments->count()}}</h5>
                                    <span class="description-text">COMMENTS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- Small boxes (Stat box) -->

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <h5 class="text-center "> Last Activity </h5>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <!-- Post -->
                            @foreach($comments as $value)
                                <div class="post">
                                    <div class="">
                                    <span class="username">
                                        <p>{{$user->name}}</p>
                                     </span>
                                        <span class="description">{{$value-> DataAsCarbon->diffForHumans()}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        {{$value->message}}
                                    </p>

                                    <p>
                                        <a href="{{route('main.show', $value->posts[0]->id)}}"
                                           class="link-black text-sm mr-2 text-blue"><i class="fas fa-share mr-1"></i>
                                            Go to post << {{$value->posts[0]->title}} >></a>
                                        <span class="float-right">
                        </span>
                                    </p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>


    </section>


@endsection
