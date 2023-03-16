<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($all_permissions->pluck('id'));

        $admin_permissions = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 11) != 'permission_';
            // return substr($permission->title, 0, 5) != 'user_'
            //     && substr($permission->title, 0, 5) != 'role_'
            //     && substr($permission->title, 0, 11) != 'permission_'
            //     && substr($permission->title, 0, 6) != 'asset_';
        });
        Role::findOrFail(2)->permissions()->sync($admin_permissions);
    }
}
