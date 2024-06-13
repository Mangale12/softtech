<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'unique_id' => 11113321,
            'name' => 'Thaman Tharu',
            'username' => 'Thaman Tharu',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('Softech@123'),
            'role' => 'admin',
            'role_super' => 1,
            'email_verified_at' => new DateTime(),
            'created_at' => new DateTime(),
        ]);
        User::create([
            'unique_id' => 11113322,
            'name' => 'User One',
            'username' => 'test',
            'email' => 'user@gmail.com',
            'password' => bcrypt('Softech@123'),
            'role' => 'user',
            'email_verified_at' => new DateTime(),
            'created_at' => new DateTime(),
        ]);
    }
}
