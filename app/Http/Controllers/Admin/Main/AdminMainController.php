<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index()
    {
        $post = Post::all()->count();
        $user = User::all()->count();
        $category = Category::all()->count();
        $tag = Tag::all()->count();

        return view('admin.main.index', compact('user','post', 'tag','category'));
    }
}

