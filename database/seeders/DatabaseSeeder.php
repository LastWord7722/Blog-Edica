<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostUserLike;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    //пару ролей
        Role::factory(1)->create();

        Role::factory(1)->create([
            'name_role' => 'admin',
        ]);

        // Добавляем все остольное
        Category::factory(15)->create();
        Tag::factory(15)->create();
        Post::factory(21)->create();
        PostTag::factory(100)->create();
        User::factory(10)->create();
        //admin
        User::factory(1)->create([
            'name' => 'Mark',
            'email' => 'LastWordMark@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('0000'),
            'remember_token' => Str::random(10),
            'role_id' => 2,
        ]);
        //
        PostUserLike::factory(500)->create();
        Comment::factory(500)->create();

    }
}
