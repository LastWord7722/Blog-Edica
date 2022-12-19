@extends('admin.layouts.main')

@section('admin_content')
    <p></p>



    <div class="row" style="margin-top: 3px; margin-left: 30px">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All users</h3>
                    <div class="col-10">
                        <div class="col-3 d-flex">
                            <a href="{{route('admin.user.create')}}" class="btn btn-block btn-info align-right"><i class="fa-solid fa-plus"></i> Create user </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Look at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name_role}}</td>
                                <td><a href="{{route('admin.user.show',$user->id)}}"><i class="fa-regular fa-eye"></i> </a></td>
                                <td><a href="{{route('admin.user.edit', $user->id)}}" class="text-success"><i class="fa-regular fa-pen-to-square"></i> </a></td>
                                <td>
                                    <form  action="{{route('admin.user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fa-solid fa-user-large-slash text-danger" role="button"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
