<?php

namespace Database\Seeders; // ✅ Correct namespace

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name' => 'super', 'title' => 'Super Admin'],
            ['role_name' => 'user', 'title' => 'User Admin'],
            ['role_name' => 'sales', 'title' => 'Sales Team'],
        ]);

    }
}
