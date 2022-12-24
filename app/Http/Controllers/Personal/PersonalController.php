<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Profile;
use App\Http\Requests\Personal\Profile\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function home()
    {
        $liked = auth()->user()->LikedPosts->count();
        $comments = auth()->user()->comments->count();


        return view('personal.main.index', compact('liked', 'comments'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('personal.main.edit', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        auth()->user()->update($data);

        return redirect()->route('personal.home');

    }
}
