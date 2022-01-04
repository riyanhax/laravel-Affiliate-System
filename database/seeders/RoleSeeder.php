<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                "role" => "Super Admin"
            ],
            [
                "role" => "affiliator"
            ],
            [
                "role" => "user"
            ],
        ]);

        DB::table('users')->insert([
            [
                "name" => "Super Admin",
                "email" => "superadmin@gmail.com",
                "password" => bcrypt(1234),
                "reffer_code" => null,
                "role_id" => 1,
            ],
            [
                "name" => "affiliator",
                "email" => "affliator@gmail.com",
                "password" => bcrypt(1234),
                "reffer_code" => "2022",
                "role_id" => 2,
            ],
            [
                "name" => "user",
                "email" => "user@gmail.com",
                "password" => bcrypt(1234),
                "reffer_code" => null,
                "role_id" => 3,
            ],
        ]);

        DB::table('user_work_analyses')->insert([
            'user_id' => 2,
            'total_clicks' => 1,
            'total_orders' => 0
        ]);
    }
}
