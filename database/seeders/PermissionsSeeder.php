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
            'AgricultureCategory',
            'Animal',
            'AnudaanCategory',
            'Anudann',
            'Beema',
            'Billing',
            'BiuBijan',
            'BillingDetail',
            'Block',
            'DamageRecord',
            'DamageType',
            'Dealer',
            'Farm',
            'Farm Activity',
            'Payment',
            'FarmAmdani',
            'FinanceTitle',
            'Field',
            'Inventory',
            'LekhaSirsak',
            'Fiscal',
            'MalBibran',
            'Mesinary',
            'OtherMaterial',
            'ProductionBatch',
            'RawMaterial',
            'RawMaterialSupply',
            'SalesOrder',
            'Season',
            'Seed',
            'SeedType',
            'Setting',
            'SeedBatch',
            'Supplier',
            'Talim',
            'TrainingPerson',
            'Transaction',
            'Unit',
            'User',
            'Voucher',
            'WorkerList',
            'WorkerPosition',
            'WorkerTypes',
        ];

        // Define a list of actions
        $actions = ['view', 'create', 'edit', 'delete'];

        // Loop through each model and action to create permissions
        foreach ($models as $model) {
            foreach ($actions as $action) {
                $permissionName = "{$action} {$model}";
                Permission::firstOrCreate(['name' => $permissionName]);
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

