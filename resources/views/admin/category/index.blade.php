@extends('admin.layouts.main')

@section('admin_content')



    <div class="row" style="margin-top: 3px; margin-left: 30px">
        <div class="col-9">
            <div class="card ">
                <div class="card-header d-flex">
                    <h2 class="card-title ">All categories</h2>
                    <div class="col-10 ">
                        <div class="col-3">
                            <a href="{{route('admin.category.create')}}" class="btn btn-block btn-info align-right"><i class="fa-solid fa-plus"></i> Create category </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Look at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $catigories)
                            <tr>
                                <td>{{$catigories->id}}</td>
                                <td>{{$catigories->title_category}}</td>
                                <td><a href="{{route('admin.category.show',$catigories->id)}}"><i class="fa-regular fa-eye"></i> </a></td>
                                <td><a href="{{route('admin.category.edit', $catigories->id)}}" class="text-success"><i class="fa-regular fa-pen-to-square"></i> </a></td>
                                <td>
                                    <form  action="{{route('admin.category.destroy',$catigories->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                        <i class="fa-regular fa-trash-can text-danger" role="button"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
            <div class="mt-4">
                <h6>  {{$category -> links('vendor.pagination.bootstrap-4')}} </h6>
            </div>
        </div>
    </div>
@endsection
