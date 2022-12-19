@extends('admin.layouts.main')

@section('admin_content')
    <div class="text-info ml-4">
        <h3>Update user</h3>
    </div>



    <form action="{{route('admin.user.update', $user->id)}} " class="col-9" method="post">
        @method('patch')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Name user</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter title">
                @error('name')
                <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mail</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter mail">
                @error('email')
                <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password"  class="form-control" placeholder="Enter password">
                @error('password')
                <div class="text-danger"> {{$message}} </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="'exampleFromConrolSelect1">Update role for user</label>
                <select class="form-control" id="role" name="role_id">
                    @foreach($roles as $role )
                        <option value="{{$role->id}}"
                        >{{$role->name_role}}</option>
                    @endforeach
                </select>
            </div>

            <!--Поле для создания исключения в ревест -->
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{$user->id}}">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>

                <a href="{{route('admin.user.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
            </div>
    </form>
@endsection
