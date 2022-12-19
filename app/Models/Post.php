<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Posts';
    protected $guarded = false;


    public function tag(){
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function LikesPost(){
       return $this->hasMany(PostUserLike::class, 'post_id','id');
    }

    public function UserComment(){
        return $this->hasMany(Comment::class, 'post_id', 'id')->
        join('Users','comments.user_id','=', 'users.id')->
            select('comments.created_at', 'users.name','comments.message')->
            orderBy('created_at', 'desc');
    }

    public function UsersLikdMorePost(){
        return $this->belongsToMany(User::class, 'post_user_likes','post_id','user_id');
    }
}
