<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;

        $dataComment = Comment::With('posts')->where('user_id','=', $user)->get();

        return view('personal.comment.index', compact('dataComment'));
    }

    public function edit(Comment $comment)
    {
        return view('personal.comment.edit', compact('comment' ));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {

        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('personal.comment.index');
    }
}
