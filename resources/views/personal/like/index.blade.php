@extends('personal.layouts.main')

@section('personal_content')


    <div class="row" style="margin-top: 3px; margin-left: 30px">
        <div class="col-9">
            <div class="card ">
                <div class="card-header d-flex">
                    <h2 class="card-title ">All list you liked posts {{$likes->count()}}</h2>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Title post</th>
                            <th>Go to post</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($likes as $like)
                            <tr>
                                <td>{{$like->title}}</td>
                                <td class="text-success"><a href="{{route('main.show',$like->id)}}"><i class="fa-regular fa-eye"></i></a> </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
