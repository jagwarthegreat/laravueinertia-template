<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                "id" => 1,
                "employee_id" => 0,
                "name" => "SUPER USER",
                "email_verified_at" => NULL,
                "username" => "admin",
                "password" => '$2y$10$GUxtPo1GXNgCvelfJoBtDO71vKEQyK.LgVrmdIc/ZfuFIDPzlrtqS',
                "remember_token" => NULL,
                "created_at" => "2022-11-02 13:07:31",
                "updated_at" => "2022-11-02 13:07:32",
            ),
        );

        User::insert($users);
    }
}
