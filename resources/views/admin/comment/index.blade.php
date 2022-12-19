@extends('admin.layouts.main')

@section('admin_content')

    <div class="row" style="margin-top: 3px; margin-left: 30px">
        <div class="col-9">
            <div class="card ">
                <div class="card-header d-flex">
                    <h2 class="card-title ">All comments {{$comments->count()}}</h2>

                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Title post</th>
                        <th>Massage</th>
                        <th>Edit</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                             <td>  {{$comment->users[0]->name}}> </td>
                            <td><a href="{{route('main.show',$comment->posts[0]->id )}}">{{$comment->posts[0]->title}} </a></td> </a>
                            <td>{{$comment->message}}</td>
                            <td><a href="{{route('admin.comment.edit',$comment->id )}}" class="text-success"><i class="fa-regular fa-pen-to-square"></i> </a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
