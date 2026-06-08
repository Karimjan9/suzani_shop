<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use UnexpectedValueException;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_seeder_creates_local_default_admin_when_none_exists(): void
    {
        $this->seed(AdminUserSeeder::class);

        $user = User::query()->firstOrFail();

        $this->assertSame('admin', $user->login);
        $this->assertSame('admin@suzani-shop.local', $user->email);
        $this->assertTrue(Hash::check('admin12345', $user->password));
        $this->assertTrue($user->hasRole('admin'));
    }

    public function test_admin_seeder_does_not_overwrite_existing_database_admin(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $user = User::factory()->create([
            'login' => 'database-admin',
            'email' => 'admin@example.com',
            'password' => 'database-secret',
        ]);
        $user->syncRoles([$adminRole]);

        $this->seed(AdminUserSeeder::class);

        $this->assertDatabaseCount('users', 1);

        $user = $user->fresh();

        $this->assertSame('database-admin', $user?->login);
        $this->assertSame('admin@example.com', $user?->email);
        $this->assertTrue(Hash::check('database-secret', (string) $user?->password));
        $this->assertTrue($user?->hasRole('admin'));

        $response = $this->post(route('login.attempt'), [
            'login' => 'database-admin',
            'password' => 'database-secret',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_seeder_requires_existing_database_admin_in_production(): void
    {
        $this->app->detectEnvironment(fn (): string => 'production');

        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Admin user must already exist in the database before seeding production.');

        app(AdminUserSeeder::class)->run();
    }

    public function test_login_attempts_are_rate_limited(): void
    {
        RateLimiter::clear('throttle-user|127.0.0.1');

        for ($attempt = 1; $attempt <= 5; $attempt++) {
            $this->post(route('login.attempt'), [
                'login' => 'throttle-user',
                'password' => 'wrong-password',
            ])->assertSessionHasErrors('login');
        }

        $this->post(route('login.attempt'), [
            'login' => 'throttle-user',
            'password' => 'wrong-password',
        ])->assertTooManyRequests();
    }
}
