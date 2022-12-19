<?php

namespace App\Http\Controllers\home\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryPostsController extends Controller
{
    public function index()
    {
       $categories = Category::all();

        return view('main.category.index', compact('categories'));
    }

    public function getPosts(Category $category){
        $posts = $category->posts()->paginate(6);


        return view('main.category.postsCategory', compact('posts'));
    }

}

