@extends('admin.layouts.main')


@section('admin_content')

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$post}}</h3>

                            <p>Number of posts</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-paste"></i>
                        </div>
                        <a href="{{route('admin.post.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$user}}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$tag}}</h3>

                            <p>Number of tags</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-tags"></i>
                        </div>
                        <a href="{{route('admin.tag.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$category}}<sup style="font-size: 20px"></sup></h3>

                            <p>Number of categories</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-square-check"></i>
                        </div>
                        <a href="{{route('admin.category.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <h5 class="text-center "> Last Activity comments fot Site</h5>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <!-- Post -->
                        @foreach($lastActivity as $value)
                            <div class="post">
                                <div class="">
                                    <span class="username">

                                        <p class="text-dark"> {{$value->users[0]->role->name_role}}   {{$value->users[0]->name}}</p>
                                     </span>
                                    <span class="description">{{$value-> DataAsCarbon->diffForHumans()}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p class="text-dark fw-bold">
                                    {{$value->message}}
                                </p>

                                <p>
                                    <a href="{{route('main.show', $value->posts[0]->id)}}"
                                       class="link-black text-sm mr-2 text-blue"><i class="fas fa-share mr-1"></i>
                                        Go to post << {{$value->posts[0]->title}} >></a>
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
