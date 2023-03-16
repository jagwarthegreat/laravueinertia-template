<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermisionController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('permission_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $permissions = Permission::where('id', '>', '0')->orderBy('id', 'desc')->get();
        $canCreate = Gate::allows('permission_create');

        return Inertia::render('Permission/Index', compact('permissions', 'canCreate'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('permission_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return Inertia::render('Permission/Create');
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('permission_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        Permission::create([
            'title' => $request->title,
        ]);

        return redirect('permission');
    }
}
