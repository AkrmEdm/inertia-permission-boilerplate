<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Principal']);
        Role::create(['name' => 'Teacher']);
        Role::create(['name' => 'Admin Staff']);
        Role::create(['name' => 'User']);
    }
}
