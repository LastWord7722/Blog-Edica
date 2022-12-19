@extends('admin.layouts.main')

@section('admin_content')
    <div class="text-info ml-4">
        <h3>Update category</h3>
    </div>

    <form action="{{route('admin.like.update', $category->id)}} " class="col-9" method="post">
        @method('patch')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title category</label>
                <input value="{{$category->title_category}}" type="text" name="title" class="form-control" placeholder="Enter title"><!--name="title-like, падает в стор реквест -->
                @error('title')<!--по неймингу, отоброжение ошибки -->
                    <div class="text-danger"> Это поле необходимо заполнить </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>

            <a href="{{route('admin.like.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
