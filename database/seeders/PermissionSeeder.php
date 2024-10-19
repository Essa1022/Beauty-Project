<?php

namespace Database\Seeders;

use App\Services\UserService;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role Permissions
        Permission::create(['name' => 'see.role']);
        Permission::create(['name' => 'give.role']);
        // User Permissions
        Permission::create(['name' => 'see.user']);
        Permission::create(['name' => 'update.user']);
        Permission::create(['name' => 'delete.user']);
        //Category Permissions
        Permission::create(['name' => 'update.category']);
        // Article Permissions
        Permission::create(['name' => 'create.article']);
        Permission::create(['name' => 'see.article']);
        Permission::create(['name' => 'update.article']);
        Permission::create(['name' => 'delete.article']);
        // Comment Permissions:
        Permission::create(['name' => 'see.comment']);
        Permission::create(['name' => 'update.comment']);
        Permission::create(['name' => 'delete.comment']);
        //Media Permissions
        Permission::create(['name' => 'create.media']);
        Permission::create(['name' => 'delete.media']);
        // Setting Permissions
        Permission::create(['name' => 'create.setting']);
        Permission::create(['name' => 'see.setting']);
        Permission::create(['name' => 'update.setting']);
        Permission::create(['name' => 'delete.setting']);

        // Super Admin Role
        $Super_Admin = Role::where('name', 'Super_Admin')->exists();
        if (!$Super_Admin)
        {
            $Super_Admin = Role::create(['name' => 'Super_Admin']);
        }
        // Admin Role
        $Admin = Role::where('name', 'Admin')->exists();
        if (!$Admin)
        {
            $Admin = Role::create(['name' => 'Admin']);
        }
        // Writer Role
        $Writer = Role::where('name', 'Writer')->exists();
        if (!$Writer)
        {
            $Writer = Role::create(['name' => 'Writer']);
        }

        $Super_Admin->syncPermissions(Permission::all());

        $Admin->syncPermissions([
            'see.user',
            'update.user',
            'delete.user',
            'update.category',
            'create.article',
            'see.article',
            'update.article',
            'delete.article',
            'see.comment',
            'update.comment',
            'delete.comment',
            'create.media',
            'delete.media',
        ]);

        $Writer->syncPermissions([
            'create.article',
            'see.article',
            'update.article',
            'delete.article',
            'create.media',
            'delete.media'
        ]);

        $data = [
            'first_name' => 'Ehsan',
            'last_name' => 'Zanjani',
            'phone_number' => '09023536136',
            'password' => '12345678'
        ];

        $userService = new UserService();
        $Super_Admin = $userService->storeUser($data)['data'];

        $Super_Admin->assignRole('Super_Admin');

    }
}
