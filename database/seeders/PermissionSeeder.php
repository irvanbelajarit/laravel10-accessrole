<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permission for "create"
        Permission::create(['name' => 'create']);

        // Create permission for "read"
        Permission::create(['name' => 'read']);

        // Create permission for "update"
        Permission::create(['name' => 'update']);

        // Create permission for "delete"
        Permission::create(['name' => 'delete']);
    }
}
