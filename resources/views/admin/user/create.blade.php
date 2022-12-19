@extends('admin.layouts.main')

@section('admin_content')

    <div class="text-info ml-4">
        <h3> Create user</h3>
    </div>



    <form action="{{route('admin.user.store')}} " class="col-9" method="post">
        @method('POST')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Name user</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter title">
                <!--name="title, падает в стор реквест -->
            </div>

            <div class="form-group">
                <label>Mail</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter mail">
                @error('email')
                <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>


            <div class="form-group">
                <label for="'exampleFromConrolSelect1">Role for user</label>
                <select class="form-control" id="role" name="role_id">
                    @foreach($roles as $role )
                        <option value="{{$role->id}}"
                        > {{$role->id}} {{$role->name_role}}</option>
                    @endforeach
                </select>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>

                <a href="{{route('admin.user.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@endsection
