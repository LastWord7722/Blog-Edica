@extends('personal.layouts.main')

@section('personal_content')

    <form action="{{route('personal.home.update', $user->id)}} " class="col-9" method="post">
        @method('POST')
        @csrf
        <div class="d-flex flex-row">
            <div class="card card-primary card-outline col-9 ml-5 flex-row ">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">Update Profile</h3>
                    <p class="text-muted text-center">{{$user->role->name_role}}</p>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter title"
                                   value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter title"
                                   value="{{$user->email}}"> <!--проверь нейминг -->
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary btn-block"><b>Update</b></a>  <!--роутинг! -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="text-center col-auto m-lg-5 d-flex flex-column " >
                <img class="card-img-top img-fluid rounded-circle " style="width: 16rem; height: 16rem;"
                     src="{{asset('storage/images/DNgdgnrWqm8FbuPBWXHisIM9gaqa9C96mPTxi55u.gif')}}"
                     alt="User profile picture">
                <button class="btn btn-primary btn-block mt-3">
                    Add Avater
                </button>
            </div>
        </div>
    </form>
@endsection