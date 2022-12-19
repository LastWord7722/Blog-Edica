<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use App\Service\Admin\AdminUserService;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));

    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request, AdminUserService $service)
    {

        $data= $request->validated();

        $service ->store($data);

        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {

        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {

        $data = $request->validated();
        $user->update($data);

        return redirect()->route('admin.user.show', compact('user'));
    }

    public function destroy(User $user, Comment $comment)
    {
        $user->delete();

        return redirect()->route('admin.user.index',compact('user'));
    }

}


