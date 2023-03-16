<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array(
            array(
                "id" => 1,
                "title" => "user_management_access",
                "created_at" => "2022-11-07 05:33:52",
                "updated_at" => "2022-11-07 05:33:52",
            ),
            array(
                "id" => 2,
                "title" => "permission_access",
                "created_at" => "2022-11-07 05:42:47",
                "updated_at" => "2022-11-07 05:42:47",
            ),
            array(
                "id" => 3,
                "title" => "permission_create",
                "created_at" => "2022-11-07 05:44:29",
                "updated_at" => "2022-11-07 05:44:29",
            ),
            array(
                "id" => 4,
                "title" => "permission_edit",
                "created_at" => "2022-11-07 05:44:40",
                "updated_at" => "2022-11-07 05:44:40",
            ),
            array(
                "id" => 5,
                "title" => "permission_show",
                "created_at" => "2022-11-07 05:44:48",
                "updated_at" => "2022-11-07 05:44:48",
            ),
            array(
                "id" => 6,
                "title" => "permission_delete",
                "created_at" => "2022-11-07 05:44:57",
                "updated_at" => "2022-11-07 05:44:57",
            ),
            array(
                "id" => 7,
                "title" => "role_create",
                "created_at" => "2022-11-07 05:45:19",
                "updated_at" => "2022-11-07 05:45:19",
            ),
            array(
                "id" => 8,
                "title" => "role_edit",
                "created_at" => "2022-11-07 05:45:26",
                "updated_at" => "2022-11-07 05:45:26",
            ),
            array(
                "id" => 9,
                "title" => "role_show",
                "created_at" => "2022-11-07 05:45:34",
                "updated_at" => "2022-11-07 05:45:34",
            ),
            array(
                "id" => 10,
                "title" => "role_delete",
                "created_at" => "2022-11-07 05:45:40",
                "updated_at" => "2022-11-07 05:45:40",
            ),
            array(
                "id" => 11,
                "title" => "role_access",
                "created_at" => "2022-11-07 05:45:49",
                "updated_at" => "2022-11-07 05:45:49",
            ),
            array(
                "id" => 12,
                "title" => "user_create",
                "created_at" => "2022-11-07 05:45:59",
                "updated_at" => "2022-11-07 05:45:59",
            ),
            array(
                "id" => 13,
                "title" => "user_edit",
                "created_at" => "2022-11-07 05:46:06",
                "updated_at" => "2022-11-07 05:46:06",
            ),
            array(
                "id" => 14,
                "title" => "user_show",
                "created_at" => "2022-11-07 05:46:14",
                "updated_at" => "2022-11-07 05:46:14",
            ),
            array(
                "id" => 15,
                "title" => "user_delete",
                "created_at" => "2022-11-07 05:46:22",
                "updated_at" => "2022-11-07 05:46:22",
            ),
            array(
                "id" => 16,
                "title" => "user_access",
                "created_at" => "2022-11-07 05:46:29",
                "updated_at" => "2022-11-07 05:46:29",
            ),
        );


        Permission::insert($permissions);
    }
}
