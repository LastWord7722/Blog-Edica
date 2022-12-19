<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

class HomePostsController extends Controller
{
    public function index()
    {
        $fivePopularCategories = Category::withCount('posts')->orderBy('posts_count', 'DESC')->paginate(5);
        $posts = Post::withCount('UsersLikdMorePost')->withCount('Comment')->paginate(6);
        $postRandom = Post::withCount('UsersLikdMorePost')->withCount('Comment')->get()->random(4);
        $postMoreLiked = Post::withCount('UsersLikdMorePost')->withCount('Comment')->orderBy('users_likd_more_post_count', 'DESC')->
        paginate(4);
        $DiscussedPost = Post::withCount('UsersLikdMorePost')->withCount('Comment')->orderBy('comment_count', 'DESC')->first();


        return view('main.index', compact('posts', 'postRandom', 'postMoreLiked', 'DiscussedPost',
            'fivePopularCategories'));
    }

   public function show(Post $post)
    {

        $randomPost = Post::withCount('UsersLikdMorePost')->withCount('Comment')->with('tag')->get()->random(3);


        return view('main.show', compact('post','randomPost'));
    }

}

