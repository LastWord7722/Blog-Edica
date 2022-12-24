@extends('personal.layouts.main')

@section('personal_content')

    <form action="{{route('personal.home.update', auth()->user()->id)}} " class="col-9" method="post">
        @method('POST')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input  type="text" name="name" class="form-control" placeholder="Enter title" value="{{auth()->user()->name}}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('personal.home')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection