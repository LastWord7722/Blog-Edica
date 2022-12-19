@extends('admin.layouts.main')

@push('style')
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endpush

@section('admin_content')

    <div class="text-info ml-4">
        <h3>Сreate post</h3>
    </div>
    <!--enctype="multipart/form-data"> это требуется чтоб изображения приходили не в виде строки, а виде файла -->
    <form action="{{route('admin.post.store')}} " class="col-9" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Title post</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter title">
                <!--name="title, падает в стор реквест -->
            @error('title')<!--по неймингу, отоброжение ошибки -->
                <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>
            <label>Content post</label>
            <div class="form-group">

                <textarea id="summernote" name="content"> {{ old('content') }}</textarea>
            @error('content')<!--по неймингу, отоброжение ошибки -->
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Tags</label>
                <!--ОБРАТИТЬ ВНИМАНИЕ НА ИМЯ [] необходимо для мульти селекта, иначе будет возвращать ток последний элемент!!!!-->
                <select name='tags_ids[]' class="select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                    @foreach($tags as $tag)
                        <!--Я когда то обязательно пойму как прописывать эти условия... Но не сегодня-->
                        <!--если массив tags_ids который пошел в метод пост и масив со значениям tag id старое значение тег выбраеть его -->
                    <option {{ is_array( old('tags_ids')) && in_array($tag->id, old('tags_ids')) ? 'selected' : '' }} value="{{$tag->id}}">
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
                <select class="form-control" id="'category" name="category_id">
                    <!--не забываем дать имя, чтоб передать в функцию store -->
                    @foreach($categories as $category )

                        <option value="{{$category->id}}"
                            {{ $category->id == old('category_id') ? 'selected' : '' }} >
                            <!--выше, происходит условия, для выбора в случае не заполнения полей, с выбором ид, делать в откр теги -->
                            {{$category->id}} ) {{$category->title_category}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputFile">Preview image input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name='preview_image'>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('preview_image')
                <div class="text-danger"> {{$message}}</div>
                @enderror

                <label for="exampleInputFile">Main image input</label>
                <div class="input-group ">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name='main_image'>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('main_image')
                <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create post</button>

                <a href="{{route('admin.post.index')}}" style="margin-left:10px" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>

    @push('script')
        <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!--ниже инициация js файла для изоброжений -->
        <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
        <!--ниже инициация select -->
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
            //инициализация плагина для изоброжения
            $(function () {
                bsCustomFileInput.init();
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
