<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'name' => "Admin Admin",
            'user_name' => "admin57",
            'email' => "admin@admin.com",
            'phone' => "0545432140",
            'role_id' => 1,
            'alias' => "Admin-Admin-admin57",
            'password' => Hash::make("password01")
        ]) ;
    }
}
