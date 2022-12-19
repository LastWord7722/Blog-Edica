@extends('admin.layouts.main')

@section('admin_content')

    <div class="row" style="margin-top: 30px; margin-left: 30px">
        <div class="col-9">
            <div class="card">
                <div class="col-sm-6 d-flex">
                    <h2 class="m-0 mr-2">{{$user->name}}</h2>
                    <a href="{{route('admin.user.edit', $user->id)}}"><i
                            class="fa-regular fa-pen-to-square"></i> </a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mail</th>
                            <th>Role</th>
                        </tr>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td> {{$user->role->name_role}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<div>
    <a href="{{route('admin.user.index')}}" style="margin-left:40px" class="btn btn-primary">Back</a>
</div>
@endsection
