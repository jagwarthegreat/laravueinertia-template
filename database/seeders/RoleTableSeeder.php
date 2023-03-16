<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array(
                "id" => 1,
                "title" => "Superadmin",
                "created_at" => "2022-11-07 06:48:24",
                "updated_at" => "2022-11-07 06:48:24",
            ),
            array(
                "id" => 2,
                "title" => "Admin",
                "created_at" => "2022-11-30 12:06:33",
                "updated_at" => "2022-11-30 12:06:33",
            ),
        );


        Role::insert($roles);
    }
}
