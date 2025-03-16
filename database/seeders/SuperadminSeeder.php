<?php
namespace Database\Seeders; // ✅ Correct namespace
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    public function run()
    {
        // Fetch the Superadmin role ID
        $superadminRole = DB::table('roles')->where('role_name', 'super')->first();

        // Insert Superadmin user
        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password123'),
            'role_id' => $superadminRole->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

