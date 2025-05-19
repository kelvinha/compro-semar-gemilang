<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create superadmin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'superadmin')->first()->id,
            'avatar' => null,
            'is_active' => true
        ]);

        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'admin')->first()->id,
            'avatar' => null,
            'is_active' => true
        ]);

        // Create editor user
        User::create([
            'name' => 'Editor User',
            'email' => 'editor@admin.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'editor')->first()->id,
            'avatar' => null,
            'is_active' => true
        ]);
    }
}
