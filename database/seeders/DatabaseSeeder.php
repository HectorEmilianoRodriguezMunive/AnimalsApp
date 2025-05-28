<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => "admin"])
        ->givePermissionTo(Permission::create(['name' => '*']));
        Role::create(['name' => "client"])
        ->givePermissionTo(Permission::create(['name' => 'see_quotes']), 
        Permission::create(['name' => 'delete_quotes'], 
        Permission::create(['name' => 'edit_quotes'])));

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ])->assignRole($admin);

        

    }
}
