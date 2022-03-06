<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesTableSeeder extends Seeder
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

        // Seed "Super Admin" role
        $seededRoleName = "Super-Admin";
        $role = Role::where('name', '=', $seededRoleName)->first();
        if ($role === null){
            $role = Role::create([
                'name' => $seededRoleName
            ]);
            $role->save();
        }

        // Seed "Staff" role
        $seededRoleName = "staff";
        $role = Role::where('name', '=', $seededRoleName)->first();
        if ($role === null){
            $role = Role::create([
                'name' => $seededRoleName
            ]);
            $role->save();
        }

        // Seed "User" role
        $seededRoleName = "user";
        $role = Role::where('name', '=', $seededRoleName)->first();
        if ($role === null){
            $role = Role::create([
                'name' => $seededRoleName
            ]);
            $role->save();
        }
    }
}
