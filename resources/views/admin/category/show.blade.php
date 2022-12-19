@extends('admin.layouts.main')

@section('admin_content')

    <div class="row" style="margin-top: 30px; margin-left: 30px">
        <div class="col-9">
            <div class="card">
                <div class="col-sm-6 d-flex">
                    <h2 class="m-0 mr-2">{{$category->title_category}}</h2>
                    <a href="{{route('admin.category.edit', $category->id)}}"><i
                            class="fa-regular fa-pen-to-square"></i> </a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                        </tr>
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title_category}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<div>
    <a href="{{route('admin.category.index')}}" style="margin-left:40px" class="btn btn-primary">Back</a>
</div>
@endsection
