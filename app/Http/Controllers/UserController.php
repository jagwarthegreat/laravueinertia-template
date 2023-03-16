<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('user_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $roles = Role::where("id", "!=", 1)->get();
        $users = User::where('id', '!=', 1)->get();
        $canCreate = Gate::allows('user_access');

        return Inertia::render('User/Index', compact('users','canCreate', 'roles'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('user_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $roles = Role::where("id", "!=", 1)->get();
        return Inertia::render('User/Create', compact('roles'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('user_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'roles' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'employee_id' => 0,
            'name' => "test",
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        $user->roles()->sync($request->roles);
        return redirect('user');
    }

    public function update(Request $request)
    {
        abort_if(
            Gate::denies('user_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'roles' => 'required',
            'username' => 'required',
        ]);

        $role_ids = [];
        foreach ($request->roles as $role) {
            $role_ids[] = $role['value'];
        }

        User::where('id', $request->user_id)->update([
            'employee_id' => 0,
            'name' => "test",
            'username' => $request->username
        ]);

        $user = User::where('id', $request->user_id)->first();
        $user->roles()->sync($role_ids);
        return redirect('user');
    }
}
