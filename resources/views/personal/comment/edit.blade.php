@extends('personal.layouts.main')

@section('personal_content')
    <div class="text-info ml-4">
        <h3>Update comment</h3>
    </div>

    <div class="card card-primary card-outline col-9 ml-4">
        <a class="d-block w-100" data-toggle="collapse" href="#">
            <div class="card-header">
                <h4 class="card-title w-100">
                    <a href="{{route('main.show', $comment->posts[0]->id)}}">  Go to << {{$comment->posts[0]->title}} #{{$comment->posts[0]->id}} >> </a>
                </h4>
            </div>
        </a>
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body">
                Posts : {{$comment->posts[0]->title}}
            </div>
        </div>
    </div>

    <form action="{{route('personal.comment.update', $comment->id)}} " class="col-9" method="post">
        @method('patch')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Message</label>
                <input value="{{$comment->message}}" type="text" name="message" class="form-control" placeholder="Enter title"><!--name="title-like, падает в стор реквест -->
            @error('message')<!--по неймингу, отоброжение ошибки -->
                <div class="text-danger"> Это поле необходимо заполнить </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>

            <a href="{{route('personal.comment.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
