<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'Full access to everything'
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'description' => 'Can create, edit, and publish posts'
            ],
            [
                'name' => 'Author',
                'slug' => 'author',
                'description' => 'Can create and edit their own posts'
            ],
            [
                'name' => 'Subscriber',
                'slug' => 'subscriber',
                'description' => 'Can only view content'
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }
    }
}