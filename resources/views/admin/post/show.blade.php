
@extends('admin.layouts.main')

@section('admin_content')


    <div class="row table" style="margin-top: 30px; margin-left: 30px">
        <div class="col-9">
            <div class="card">
                <div class="col-sm-6 d-flex">
                    <a href="{{route('main.show', $post->id)}}" class="text-success h2 m-0 mr-2 ">{{$post->title}}</a>
                    <a href="{{route('admin.post.edit', $post->id)}}"><i
                            class="fa-regular fa-pen-to-square"></i> </a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Content</th>
                        </tr>
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->title_category}}</td>
                            <td>{!!$post->content!!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row table" style="margin-top: 30px; margin-left: 30px">
        <div class="col-11">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <th>Preview image</th>
                            <th>Main image</th>
                        </tr>
                        <tr>
                            <td> <img src="{{url('storage/' . $post->preview_image)}}" alt="Preview image" width="550" height="350"> </td>
                            <td> <img src="{{url('storage/' . $post->main_image) }}" alt="Main image" width="550" height="350"> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div>
        <a href="{{route('admin.post.index')}}" style="margin-left:40px" class="btn btn-primary">Back</a>
    </div>
@endsection
