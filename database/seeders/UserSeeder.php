<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('rahasia'),
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@localhost',
            'password' => bcrypt('rahasia'),
        ]);

        $user->assignRole('User');
    }
}
