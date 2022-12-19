@extends('admin.layouts.main')

@section('admin_content')
    <div class="text-info ml-4">
        <h3>Update comment</h3>
    </div>

    <div class="card card-primary card-outline col-9 ml-4">
        <a class="d-block w-100" data-toggle="collapse" href="#">
            <div class="card-header">
                    Go to <a href="{{route('main.show', $comment->posts[0]->id)}}"> << {{$comment->posts[0]->title}} #{{$comment->posts[0]->id}} >> </a>

            </div>
        </a>
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body">
                User : {{$comment->users[0]->name}}
            </div>
        </div>
    </div>

    <form action="{{route('admin.comment.update', $comment->id)}} " class="col-9" method="post">
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

            <a href="{{route('admin.comment.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
