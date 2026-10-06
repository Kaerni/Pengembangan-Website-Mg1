<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Rek',
            'email' => 'admin22@example.com',
            'age' => 25,
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'age' => 21,
            'password' => bcrypt('password123'),
            'role' => 'user'
        ]);

        $id = DB::table('users')->insertGetId([
            'name' => 'Jane',
            'email' => 'jane123@example.com',
            'age' => 29,
            'password' => bcrypt('password123')
        ]);

        User::factory()->count(5)->create();
    }
}