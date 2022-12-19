<?php

namespace App\Http\Controllers\home\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class TagPostsController extends Controller
{
    public function index()
    {
       $tags = Tag::all();

        return view('main.tag.index', compact('tags'));
    }

    public function getPosts(Tag $tag){
      $posts = $tag->posts()->paginate(6);
        return view('main.tag.postsTag', compact('posts','tag'));
    }

}

