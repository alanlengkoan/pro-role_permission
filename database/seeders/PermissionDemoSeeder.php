<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view-product']);
        Permission::create(['name' => 'create-product']);
        Permission::create(['name' => 'update-product']);
        Permission::create(['name' => 'delete-product']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'view-product',
        ]);

        $user = User::factory()->create([
            'name'           => 'Example user',
            'email'          => 'writer@qadrlabs.com',
            'username'       => 'writer',
            'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',   // password
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole($role);
    }
}
