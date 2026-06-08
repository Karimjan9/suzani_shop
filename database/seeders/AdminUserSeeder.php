<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use UnexpectedValueException;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        if (User::role($adminRole->name)->exists()) {
            return;
        }

        if (app()->isProduction()) {
            throw new UnexpectedValueException('Admin user must already exist in the database before seeding production.');
        }

        $user = User::query()->create([
            'name' => 'Administrator',
            'login' => 'admin',
            'email' => 'admin@suzani-shop.local',
            'password' => 'admin12345',
        ]);

        $user->syncRoles([$adminRole]);
    }
}
