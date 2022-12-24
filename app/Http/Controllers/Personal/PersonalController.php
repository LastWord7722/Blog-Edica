<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function home()
    {
        $auth = Auth::user();
        $liked = auth()->user()->LikedPosts->count();
        $comments = auth()->user()->comments->count();


        return view('personal.main.index', compact('liked', 'comments', 'auth'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('personal.main.edit', compact('user'));
    }

    public function update()
    {
        $user = User::all();
        $auth = Auth::user();

        foreach ($user as $value) {
            if ($auth->id == $value->id ) {
                $authVal = $value;
            }
        }

        return redirect()->route('personal.home.edit', compact('authVal'));

    }
}
