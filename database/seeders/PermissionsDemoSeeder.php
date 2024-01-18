<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'create services']);
        Permission::create(['name' => 'edit services']);
        Permission::create(['name' => 'delete services']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'create tags']);
        Permission::create(['name' => 'edit tags']);
        Permission::create(['name' => 'delete tags']);
        Permission::create(['name' => 'edit users']);

        $role1 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create articles');
        $role2->givePermissionTo('edit articles');
        $role2->givePermissionTo('delete articles');
        $role2->givePermissionTo('create services');
        $role2->givePermissionTo('edit services');
        $role2->givePermissionTo('delete services');
        $role2->givePermissionTo('create categories');
        $role2->givePermissionTo('edit categories');
        $role2->givePermissionTo('delete categories');
        $role2->givePermissionTo('create tags');
        $role2->givePermissionTo('edit tags');
        $role2->givePermissionTo('delete tags');

        // create roles and assign existing permissions
        $role3 = Role::create(['name' => 'user']);
        $role3->givePermissionTo('create articles');
        $role3->givePermissionTo('create services');
        $role3->givePermissionTo('create categories');
        $role3->givePermissionTo('create tags');

        // create demo users
        $user = User::create([
            'name' => 'superadmin', 
            'email' => 'superadmin@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$tmFGh8.f8jwvdgvP76BMZ.XIGSxrLMtukW3MckSWJ.f1WD8Oex4T2',
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole($role1);

        // create demo users
        $user = User::create([
            'name' => 'admin', 
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$tmFGh8.f8jwvdgvP76BMZ.XIGSxrLMtukW3MckSWJ.f1WD8Oex4T2',
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole($role2);
        
        // create demo users
        $user = User::create([
            'name' => 'user', 
            'email' => 'user@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$tmFGh8.f8jwvdgvP76BMZ.XIGSxrLMtukW3MckSWJ.f1WD8Oex4T2',
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole($role3);
    }
}
