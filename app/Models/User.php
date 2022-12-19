<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail // подключаем верификацию в модель
{
    use HasApiTokens, HasFactory, Notifiable;
    // перезаписываем отправление
    public function sendEmailVerificationNotification() //перезаписываем отправление
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function LikedPosts(){

        return $this->belongsToMany(Post::class,'post_user_likes','user_id', 'post_id');
    }

    public function comments(){
        return $this->HasMany(Comment::class, 'user_id','id');
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
