<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function home(){
        $liked = auth()->user()->LikedPosts->count();
        $comments = auth()->user()->comments->count();


        return view('personal.main.index', compact('liked','comments'));
    }
}
