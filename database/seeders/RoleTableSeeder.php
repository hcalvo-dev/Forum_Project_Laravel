<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $usuario = Role::create(['name' => 'usuario']);

        Permission::create(['name' => 'administrar.users.index'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'administrar.users.edit'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'administrar.users.destroy'])->syncRoles([$admin]);
    }
}
