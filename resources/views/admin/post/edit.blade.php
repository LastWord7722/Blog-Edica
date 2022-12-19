@extends('admin.layouts.main')
@push('style')
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('admin_content')
    <div class="text-info ml-4">
        <h3> Update post</h3>
    </div>
    <form action="{{route('admin.post.update', $post->id)}} " class="col-9" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title post</label>
                <input value="{{$post->title}}" type="text" name="title" class="form-control" placeholder="Enter title">
                <!--name="title-post, падает в стор реквест -->
            @error('title')<!--по неймингу, отоброжение ошибки -->
                <div class="text-danger"> {{ $message }}</div>
                @enderror

                <label class="mt-4">Content post</label>
                <div class="form-group ">
                    <textarea id="summernote" name="content"> {{$post->content}} {{old('content')}} </textarea>
                @error('content')<!--по неймингу, отоброжение ошибки -->
                    <div class="text-danger"> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Multiple</label>
                <!--ОБРАТИТЬ ВНИМАНИЕ НА ИМЯ [] необходимо для мульти селекта, иначе будет возвращать ток последний элемент!!!!-->
                <select name='tags_ids[]' class="select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                @foreach($tags as $tag)
                    <!--Я когда то обязательно пойму как прописывать эти условия... Но не сегодня-->
                        <!--если массив tags_ids который пошел в метод пост и масив со значениям tag id старое значение тег выбраеть его -->
                        <option
                            {{ is_array( $post->tag->pluck('id')->toArray()) && in_array($tag->id, $post->tag->pluck('id')->toArray()) ? 'selected' : '' }} value="{{$tag->id}}">
                            {{$tag->id}}){{$tag->title}}
                        </option>
                    @endforeach
                </select>
                @error('tags_ids')
                <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="'exampleFromConrolSelect1">Category</label>
                <select class="form-control" id="category" name="category_id">
                    <!--не забываем дать имя, чтоб передать в функцию store -->
                @foreach($categories as $category )
                    <!-- ниже условия выбора по умолчанию категории выбор по ид, писать в откр тег опц. -->
                        <option
                            value="{{$category->id}}" {{ $category->id === $post->category_id ? ' selected' : ''}}>{{$category->id}}
                            )
                            {{$category->title_category}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group ml-4">
            <label for="exampleInputFile">Preview image input</label>
            <div>
                <img src="{{url ('storage/' . $post->preview_image ) }}" alt="preview_image" class="w-50">
                <!--Даем ссылку на изоброжения поста-->
            </div>

            <div class="input-group" style="margin-bottom: 20px">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name='preview_image'>
                    <label class="custom-file-label">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>

            <div class="form-group ml-2">
                <label for="exampleInputFile">Preview image input</label>
                <div>
                    <img src="{{url ('storage/image' . $post->main_image ) }}" alt="main_image" class="w-50">
                    <!--Даем ссылку на изоброжения поста-->
                </div>

                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name='main_image'>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update post</button>

                <a href="{{route('admin.post.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>

    @push('script')
        <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    @endpush

    @push('summerNote')
        <script>
            $(document).ready(function () {
                $('#summernote').summernote({
                    focus: true,
                    height: 300,
                    lang: 'ru-Ru',
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['photo', ['link', 'picture']],
                        ['height', ['height']]
                    ],
                });
            });
        </script>
    @endpush

    @push('select')
        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

        <script>
            $('.select2').select2()
        </script>
    @endpush
@endsection
