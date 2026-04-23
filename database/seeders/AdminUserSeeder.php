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
        $credentials = [
            'login' => $this->credential('login', 'admin'),
            'email' => $this->credential('email', 'admin@suzani-shop.local'),
            'password' => $this->credential('password', 'admin12345'),
        ];

        $user = User::query()
            ->where('login', $credentials['login'])
            ->orWhere('email', $credentials['email'])
            ->firstOrNew();

        $user->fill([
            'name' => 'Administrator',
            'login' => $credentials['login'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);
        $user->save();

        $user->syncRoles([$adminRole]);
    }

    private function credential(string $key, string $default): string
    {
        $value = config("admin.credentials.{$key}");

        if (! is_string($value)) {
            return $default;
        }

        $value = trim($value);

        return $value !== '' ? $value : $default;
    }
}
