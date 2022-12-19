@extends('personal.layouts.main')

@section('personal_content')

    <div class="row" style="margin-top: 3px; margin-left: 30px">
        <div class="col-9">
            <div class="card ">
                <div class="card-header d-flex">
                    <h2 class="card-title ">All you comments {{$dataComment->count()}}</h2>

                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Massage</th>
                        <th>Title post</th>
                        <th>Go to post</th>
                        <th>Edit</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataComment as $comments)

                        <tr>
                            <td>{{$comments->message}}</td>

                            @foreach($comments->posts as $post)
                              <td>{{$post->title}}</td>
                              <td><a href="{{route('main.show', $post->id)}}" class="text-primary"><i
                                        class="fa-regular fa-eye"></i> </a></td>
                            @endforeach

                            <td><a href="{{route('personal.comment.edit', $comments->id)}}" class="text-success"><i
                                        class="fa-regular fa-pen-to-square"></i> </a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
