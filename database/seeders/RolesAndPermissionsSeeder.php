<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view users', 'create users', 'edit users', 'delete users',
            'view posts', 'create posts', 'edit posts', 'delete posts', 'publish posts', 'unpublish posts',
            'view settings', 'update settings',
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view roles', 'create roles', 'edit roles', 'delete roles', 'assign roles',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign created permissions

        // Admin role with all permissions

    }
}
