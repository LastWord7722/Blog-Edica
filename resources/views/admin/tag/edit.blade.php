@extends('admin.layouts.main')

@section('admin_content')
    <div class="text-info ml-4">
        <h3>Update tag</h3>
    </div>



    <form action="{{route('admin.tag.update', $tag->id)}} " class="col-9" method="post">
        @method('patch')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title tag</label>
                <input value="{{$tag->title}}" type="text" name="title" class="form-control" placeholder="Enter title"><!--name="title-tag, падает в стор реквест -->
                @error('title')<!--по неймингу, отоброжение ошибки -->
                    <div class="text-danger"> Это поле необходимо заполнить </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>

            <a href="{{route('admin.tag.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
