<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define a list of models or resources
        $models = [
            'Agriculture',
            'Agriculture Category',
            'Animal',
            'Anudaan Category',
            'Anudann',
            'Beema',
            'Billing',
            'BiuBijan',
            'Billing Detail',
            'Block',
            'Damage Record',
            'Damage Type',
            'Dealer',
            'Farm',
            'Farm Activity',
            'Payment',
            'Farm Amdani',
            'Finance Title',
            'Field',
            'LekhaSirsak',
            'Fiscal',
            'MalBibran',
            'Mesinary',
            'Other Material',
            'Product',
            'Production Batch',
            'Raw Material',
            'Raw Material Supply',
            'Role',
            'Sales Order',
            'Season',
            'Seed',
            'Seed Type',
            'Setting',
            'Seed Batch',
            'Supplier',
            'Talim',
            'Training Person',
            'Transaction',
            'Unit',
            'User',
            'Voucher',
            'Worker List',
            'Worker Position',
            'Worker Types',
        ];

        // Define a list of actions
        $actions = ['view', 'create', 'edit', 'delete'];

        // Loop through each model and action to create permissions
        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permissionName = "{$action} {$model}";
                $guard_name = "{$model}";
                Permission::firstOrCreate([
                    'name' => $permissionName,
                    'model' => $guard_name,
                    'guard_name' => "web",
                ]);
            }
        }

        // Create roles and assign permissions
        // $adminRole = Role::create(['name' => 'admin']);
        // $userRole = Role::create(['name' => 'user']);

        // Assign all permissions to the admin role
        // $permissions = Permission::pluck('id')->all();
        // $adminRole->syncPermissions($permissions);

        // Assign specific permissions to the user role
        // Example: Give user role permissions for specific actions
        // $userRole->givePermissionTo('view agriculture');
        // $userRole->givePermissionTo('create farmer');
        // Add more permissions as needed
    }
}

