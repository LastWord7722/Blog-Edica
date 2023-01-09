<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Service\Admin\AdminPostService;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);

        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories=Category::all();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request, AdminPostService $service)
    {
        $data = $request->validated();
        $service ->store($data);

        return redirect()->route('admin.post.index');
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post, AdminPostService $service)
    {
        $oldPerwImage = $request->hasFile('preview_image');
        $oldMainImage = $request->hasFile('main_image');

        $data = $request->validated();

        $service->update($data, $post, $oldMainImage, $oldPerwImage);

        return redirect()->route('admin.post.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index', compact('post'));
    }

}


