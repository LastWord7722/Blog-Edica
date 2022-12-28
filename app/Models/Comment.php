<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';
    protected $guarded = false;

    public function posts()
    {
        return $this->hasMany(Post::class, 'id', 'post_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }



    public function getDataAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}
