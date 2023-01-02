<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Profile\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        $liked = auth()->user()->LikedPosts;
        $comments = auth()->user()->comments->sortByDesc('created_at');

        return view('personal.main.index', compact('liked', 'comments', 'user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('personal.main.edit', compact('user'));
    }

    public function update(UpdateRequest $request, )
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['image_avatar'] = Storage::disk('public')->put('images/avatar', $data['image_avatar']);

        $user->update($data);


        return redirect()->route('personal.home');

    }
}
