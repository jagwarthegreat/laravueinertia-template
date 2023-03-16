<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('role_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $roles = Role::with('permissions')->get();
        $canCreate = Gate::allows('role_create');

        return Inertia::render('Role/Index', compact('roles', 'canCreate'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('role_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $rolesChecks = [
            "Master Data" => [
                "parent" => 23,
                "child" => [],
            ],
            "HR Management" => [
                "parent" => 40,
                "child" => [],
            ],
            "Transactions" => [
                "parent" => 41,
                "child" => [],
            ],
            "Reports" => [
                "parent" => 44,
                "child" => [],
            ],
            "User Management" => [
                "parent" => 1,
                "child" => [
                    "Login Parameter" => 48,
                    "Roles" => 11,
                    "Users" => 16,
                ],
            ],
        ];

        $permissions = Permission::whereNotIn('id', [2,3,4,5,6])->get();
        return Inertia::render('Role/Create', compact('permissions', 'rolesChecks'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('role_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'roletitle' => 'required',
        ]);

        $role = Role::create([
            'title' => $request->roletitle,
        ]);

        $role->permissions()->sync($request->rolepermission);
        return redirect('role');
    }

    public function edit(Request $request, $id)
    {
        abort_if(
            Gate::denies('role_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $selectedRole = Role::where('id', $id)->with('permissions')->first();

        $data = [];
        foreach($selectedRole->permissions as $role){
            $data[$role->id] = 'checked';
        }

        $rolesChecks = [
            "Master Data" => [
                "parent" => [
                    "isCheck" => (array_key_exists(23, $data))?$data[23]:'',
                    "value" => 23
                ],
                "child" => [
                    "Clients" => [
                        "isCheck" => (array_key_exists(24, $data))?$data[24]:'',
                        "value" => 24
                    ],
                    "Locations" => [
                        "isCheck" => (array_key_exists(25, $data))?$data[25]:'',
                        "value" => 25
                    ],
                    "Employee Status" => [
                        "isCheck" => (array_key_exists(26, $data))?$data[26]:'',
                        "value" => 26
                    ],
                    "Employee Types" => [
                        "isCheck" => (array_key_exists(27, $data))?$data[27]:'',
                        "value" => 27
                    ],
                    "Compensation Types" => [
                        "isCheck" => (array_key_exists(28, $data))?$data[28]:'',
                        "value" => 28
                    ],
                    "Document Category" => [
                        "isCheck" => (array_key_exists(29, $data))?$data[29]:'',
                        "value" => 29
                    ],
                    "Hiring Requirements" => [
                        "isCheck" => (array_key_exists(30, $data))?$data[30]:'',
                        "value" => 30
                    ],
                    "Stocks" => [
                        "isCheck" => (array_key_exists(31, $data))?$data[31]:'',
                        "value" => 31
                    ],
                    "Stock Category" => [
                        "isCheck" => (array_key_exists(32, $data))?$data[32]:'',
                        "value" => 32
                    ],
                ],
            ],
            "HR Management" => [
                "parent" => [
                        "isCheck" => (array_key_exists(40, $data))?$data[40]:'',
                        "value" => 40
                    ],
                "child" => [
                    "Departments" => [
                        "isCheck" => (array_key_exists(33, $data))?$data[33]:'',
                        "value" => 33
                    ],
                    "Positions" => [
                        "isCheck" => (array_key_exists(18, $data))?$data[18]:'',
                        "value" => 18
                    ],
                    "Employees" => [
                        "isCheck" => (array_key_exists(17, $data))?$data[17]:'',
                        "value" => 17
                    ],
                    "Deployment" => [
                        "isCheck" => (array_key_exists(35, $data))?$data[35]:'',
                        "value" => 35
                    ],
                    "Memos" => [
                        "isCheck" => (array_key_exists(36, $data))?$data[36]:'',
                        "value" => 36
                    ],
                    "Notices" => [
                        "isCheck" => (array_key_exists(37, $data))?$data[37]:'',
                        "value" => 37
                    ],
                    "Lawsuit/Cases" => [
                        "isCheck" => (array_key_exists(38, $data))?$data[38]:'',
                        "value" => 38
                    ],
                    "Quit Claims" => [
                        "isCheck" => (array_key_exists(39, $data))?$data[39]:'',
                        "value" => 39
                    ],
                ],
            ],
            "Transactions" => [
                "parent" => [
                        "isCheck" => (array_key_exists(41, $data))?$data[41]:'',
                        "value" => 41
                    ],
                "child" => [
                    "Procurement" => [
                        "isCheck" => (array_key_exists(42, $data))?$data[42]:'',
                        "value" => 42
                    ],
                    "Stock transfer" => [
                        "isCheck" => (array_key_exists(43, $data))?$data[43]:'',
                        "value" => 43
                    ],
                ],
            ],
            "Reports" => [
                "parent" => [
                        "isCheck" => (array_key_exists(44, $data))?$data[44]:'',
                        "value" => 44
                    ],
                "child" => [
                    "Inventory" => [
                        "isCheck" => (array_key_exists(45, $data))?$data[45]:'',
                        "value" => 45
                    ],
                    "Contract Report" => [
                        "isCheck" => (array_key_exists(46, $data))?$data[46]:'',
                        "value" => 46
                    ],
                    "Employee Status" => [
                        "isCheck" => (array_key_exists(47, $data))?$data[47]:'',
                        "value" => 47
                    ],
                ],
            ],
            "User Management" => [
                "parent" => [
                        "isCheck" => (array_key_exists(1, $data))?$data[1]:'',
                        "value" => 1
                    ],
                "child" => [
                    "Login Parameter" => [
                        "isCheck" => (array_key_exists(48, $data))?$data[48]:'',
                        "value" => 48
                    ],
                    "Roles" => [
                        "isCheck" => (array_key_exists(11, $data))?$data[11]:'',
                        "value" => 11
                    ],
                    "Users" => [
                        "isCheck" => (array_key_exists(16, $data))?$data[16]:'',
                        "value" => 16
                    ],
                ],
            ],
        ];

        $canCreate = Gate::allows('role_create');

        return Inertia::render('Role/Edit', compact('selectedRole', 'canCreate', 'rolesChecks'));
    }

    public function update(Request $request)
    {
        abort_if(
            Gate::denies('role_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'roletitle' => 'required',
        ]);

        Role::where('id', $request->role_id)->update([
            'title' => $request->roletitle,
        ]);

        $role = Role::where('id', $request->role_id)->first();
        $role->permissions()->sync($request->rolepermission);
        // dd($request->rolepermission, $role, $request->role_id);

        return redirect(route('role.edit', $request->role_id));
    }
}
