@extends('admin.layouts.main')

@section('admin_content')
    <div class="text-info ml-4">
        <h3>Create category</h3>
    </div>


    <form action="{{route('admin.category.store')}} " class="col-9" method="post">
        @method('POST')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title category</label>
                <input  type="text" name="title_category" class="form-control" placeholder="Enter title"><!--name="title-category, падает в стор реквест -->
                @error('title')<!--по неймингу, отоброжение ошибки -->
                    <div class="text-danger"> Это поле необходимо заполнить </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>

            <a href="{{route('admin.category.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
