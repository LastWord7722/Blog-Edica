<?php

namespace App\Service\Admin;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminUserService
{

    public function store($data)
    {
        $password = Str::random(10); //Генерируем пароль
        $data['password']= Hash::make($password); // цепляем введеный пароль и шифруем

        $user = User::firstOrCreate(['email'=> $data['email']], $data); // cоздаем
        Mail::to($data['email'])->send(new PasswordMail($password)); // Цепляем емейл, и отправляем пароль , туда же верефикацию
        event(new Registered($user)); // запускаем событие
    }
}
