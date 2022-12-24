@extends('personal.layouts.main')

@section('personal_content')

    <form action="{{route('personal.home.update',$user->id)}} " class="col-9" method="post">
        @method('POST')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input  type="text" name="title_category" class="form-control" placeholder="Enter title" value="{{$user->name}}"><!--name="title-category, падает в стор реквест -->
            @error('title')<!--по неймингу, отоброжение ошибки -->
                <div class="text-danger"> Это поле необходимо заполнить </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>

            <a href="{{route('personal.home')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection