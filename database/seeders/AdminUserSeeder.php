<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $user = User::updateOrCreate(
            ['login' => env('ADMIN_LOGIN', 'admin')],
            [
                'name' => 'Administrator',
                'email' => env('ADMIN_EMAIL', 'admin@suzani-shop.local'),
                'password' => env('ADMIN_PASSWORD', 'admin12345'),
            ],
        );

        $user->syncRoles([$adminRole]);
    }
}
