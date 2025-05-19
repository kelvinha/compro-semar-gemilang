<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions based on routes
        $permissions = [
            // Dashboard
            'view_dashboard',
            'view_analytics',

            // Profile Management
            'view_profile',
            'update_profile',
            'change_password',

            // Content Management
            'manage_menus',
            'manage_submenus',
            'manage_pages',
            'add_page_section',
            'update_page_section',
            'delete_page_section',
            'update_section_order',
            'update_page_order',
            'view_pages',
            'edit_pages',
            'delete_pages',
            'manage_blogs',
            'manage_blog_categories',
            'manage_media',

            // Settings
            'manage_website_settings',
            'manage_seo_settings',

            // User Management (Super Admin only)
            'manage_users',
            'manage_roles',
            'manage_permissions',

            // Procurement (Super Admin and Admin)
            'manage_procurement',
            'approve_procurement',
            'deny_procurement',

            // User management
            'view_users', 'create_users', 'edit_users', 'delete_users',
            
            // Role management
            'view_roles', 'create_roles', 'edit_roles', 'delete_roles',
            
            // Permission management
            'view_permissions', 'assign_permissions',
            
            // Website settings
            'view_settings', 'edit_settings',
            
            // Menu management
            'view_menus', 'create_menus', 'edit_menus', 'delete_menus',
            
            // Page management
            'view_pages', 'create_pages', 'edit_pages', 'delete_pages',
            
            // Blog management
            'view_blogs', 'create_blogs', 'edit_blogs', 'delete_blogs', 'publish_blogs',
            
            // Media management
            'view_media', 'upload_media', 'edit_media', 'delete_media',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'display_name' => ucfirst(str_replace('_', ' ', $permission)),
                'description' => 'Permission to ' . str_replace('_', ' ', $permission)
            ]);
        }

        // Create roles with their permissions
        $roles = [
            [
                'name' => 'superadmin',
                'display_name' => 'Super Administrator',
                'description' => 'Full access to all system features',
                'permissions' => $permissions // Super admin gets all permissions
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Access to content management and settings',
                'permissions' => array_filter($permissions, function($perm) {
                    return !in_array($perm, [
                        'manage_users',
                        'manage_roles',
                        'manage_permissions'
                    ]);
                })
            ],
            [
                'name' => 'editor',
                'display_name' => 'Editor',
                'description' => 'Access to content management only',
                'permissions' => array_filter($permissions, function($perm) {
                    return in_array($perm, [
                        'view_dashboard',
                        'view_profile',
                        'update_profile',
                        'change_password',
                        'manage_menus',
                        'manage_submenus',
                        'manage_pages',
                        'add_page_section',
                        'update_page_section',
                        'delete_page_section',
                        'update_section_order',
                        'update_page_order',
                        'view_pages',
                        'edit_pages',
                        'delete_pages',
                        'manage_blogs',
                        'manage_blog_categories',
                        'manage_media'
                    ]);
                })
            ]
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleData) {
            $role = Role::firstOrCreate([
                'name' => $roleData['name'],
                'display_name' => $roleData['display_name'],
                'description' => $roleData['description']
            ]);

            $permissions = Permission::whereIn('name', $roleData['permissions'])->get();
            $role->permissions()->sync($permissions);
        }

        // Create superadmin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'superadmin')->first()->id,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'admin')->first()->id,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}
