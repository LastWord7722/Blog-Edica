@extends('personal.layouts.main')
@section('personal_content')

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$liked}}</h3>

                            <p>Liked</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <a href="{{route('personal.like.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$comments}}</h3>

                            <p>Comments</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-comments"></i>
                        </div>
                        <a href="{{route('personal.comment.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right "></i></a>
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
    </section>


@endsection
