<?php

namespace App\Http\Controllers\Personal\like;

use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function index(){

        $likes= auth()->user()->LikedPosts;

        return view('personal.like.index', compact('likes'));
    }
}
