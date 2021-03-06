<?php

namespace Tests\Feature\Admin\Admin;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function test_registration_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get(route('admin.member.create'));

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->post(route('admin.member.store'), [
                             'username'         => 'test_user',
                             'type'             => 'member',
                             'name'             => 'Test User',
                             'email'            => 'test@example.com',
                             'password'         => 'password',
                             'password_confirm' => 'password',
                         ]);

        $lastUser = User::all()->last();
        $this->assertAuthenticated();
        $response->assertRedirect(route('admin.member.show', $lastUser->code));
    }
}
