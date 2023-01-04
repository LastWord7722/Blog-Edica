<?php

namespace App\Http\Controllers\home\like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeHomeController extends Controller
{
    public function store(Post $post){
        auth()->user()->LikedPosts()->toggle($post->id);

        return redirect()->route('main.show', $post->id);
    }
}
