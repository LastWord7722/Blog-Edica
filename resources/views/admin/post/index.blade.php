@extends('admin.layouts.main')
@section('admin_content')
    <p></p>

    <div class="row" style="margin-top: 3px; margin-left: 30px">
        <div class="col-11">
            <div class="card">
                <div class="card-header ">
                    <h2 class="card-title">All post</h2>
                    <div class="col-11 d-flex">
                        <div class="col-2 ">
                            <a href="{{route('admin.post.create')}}" class="btn btn-block btn-info  align-right"><i
                                    class="fa-solid fa-plus"></i> Create post </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Look at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td class="text-nowrap text-truncate d-inline-block "
                                    style="width: 20rem;">{!! $post->content !!}</td>
                                <td>{{$post->category->title_category}}</td>
                                <td><a href="{{route('admin.post.show',$post->id)}}"><i class="fa-regular fa-eye"></i>
                                    </a></td>
                                <td><a href="{{route('admin.post.edit', $post->id)}}" class="text-success"><i
                                            class="fa-regular fa-pen-to-square"></i> </a></td>
                                <td>
                                    <form action="{{route('admin.post.destroy',$post->id)}}" method="post">
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
                <h6>  {{$posts -> links('vendor.pagination.bootstrap-4')}} </h6>
            </div>
        </div>

    </div>
@endsection
