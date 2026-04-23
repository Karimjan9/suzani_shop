<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_seeder_uses_defaults_when_credentials_are_blank(): void
    {
        Config::set('admin.credentials', [
            'login' => '   ',
            'email' => '',
            'password' => '   ',
        ]);

        $this->seed(AdminUserSeeder::class);

        $user = User::query()->firstOrFail();

        $this->assertSame('admin', $user->login);
        $this->assertSame('admin@suzani-shop.local', $user->email);
        $this->assertTrue(Hash::check('admin12345', $user->password));
        $this->assertTrue($user->hasRole('admin'));
    }

    public function test_admin_seeder_refreshes_existing_admin_credentials_and_allows_login(): void
    {
        $user = User::factory()->create([
            'login' => 'legacy-admin',
            'email' => 'admin@example.com',
            'password' => 'old-secret',
        ]);

        Config::set('admin.credentials', [
            'login' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'new-secret',
        ]);

        $this->seed(AdminUserSeeder::class);

        $this->assertDatabaseCount('users', 1);

        $user = $user->fresh();

        $this->assertSame('admin', $user?->login);
        $this->assertTrue(Hash::check('new-secret', (string) $user?->password));
        $this->assertTrue($user?->hasRole('admin'));

        $response = $this->post(route('login.attempt'), [
            'login' => 'admin',
            'password' => 'new-secret',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }
}
