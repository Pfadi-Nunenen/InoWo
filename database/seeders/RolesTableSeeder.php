<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Seed "Administrator" role
        $seededRoleName = 'Administator';
        $role = Role::where('name', '=', $seededRoleName)->first();
        if ($role === null) {
            $role = Role::create([
                'name' => $seededRoleName,
            ]);
            $role->save();
        }

        // Seed "Buchhaltung" role
        $seededRoleName = 'Buchhaltung';
        $role = Role::where('name', '=', $seededRoleName)->first();
        if ($role === null) {
            $role = Role::create([
                'name' => $seededRoleName,
            ]);
            $role->save();
        }

        // Seed "User" role
        $seededRoleName = 'User';
        $role = Role::where('name', '=', $seededRoleName)->first();
        if ($role === null) {
            $role = Role::create([
                'name' => $seededRoleName,
            ]);
            $role->save();
        }
    }
}
