<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\UpdateRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::with('users')->with('posts')->get();

        return view('admin.comment.index', compact('comments'));
    }

    public function edit(Comment $comment, Post $post)
    {
        return view('admin.comment.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('admin.comment.index', compact('comment'));
    }
}
