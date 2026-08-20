<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelSmokeTest extends TestCase
{
    use RefreshDatabase;

    private function adminUser(): User
    {
        return User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@vistaverde.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }

    public function test_admin_dashboard_renders_for_admin(): void
    {
        $this->actingAs($this->adminUser());

        $this->get('/admin')->assertSuccessful();
    }

    public function test_admin_resources_render_for_admin(): void
    {
        $this->actingAs($this->adminUser());

        $this->get('/admin/heroes')->assertSuccessful();
        $this->get('/admin/facilities')->assertSuccessful();
        $this->get('/admin/disciplines')->assertSuccessful();
        $this->get('/admin/memberships')->assertSuccessful();
        $this->get('/admin/events')->assertSuccessful();
        $this->get('/admin/hotspot-images')->assertSuccessful();
        $this->get('/admin/users')->assertSuccessful();
        $this->get('/admin/configuracion')->assertSuccessful();
    }

    public function test_admin_dashboard_denied_for_non_admin(): void
    {
        $user = User::factory()->create([
            'name' => 'Lector',
            'email' => 'lector@vistaverde.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        $this->actingAs($user);

        $this->get('/admin')->assertForbidden();
    }
}