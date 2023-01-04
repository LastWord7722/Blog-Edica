<?php

namespace App\Http\Controllers\home\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentMainController extends Controller
{
    public function store(Post $post, StoreRequest $request){

        $data=$request->validated();

        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        Comment::create($data);

        return redirect()->route('main.show', $post->id);
    }

    public function destroy(Comment $comment){
    $commentDestroy = Comment::find($comment->id);
    $commentDestroy->delete();

    return back();

    }
}
