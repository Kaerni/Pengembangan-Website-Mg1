<?php

use App\Models\User;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});

test('admins are sent to the admin dashboard and cannot open the cashier dashboard', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get(route('dashboard'))
        ->assertRedirect(route('admin.dashboard'));

    $this->get(route('admin.dashboard'))->assertOk();
    $this->get(route('admin.produk'))->assertOk();
    $this->get(route('admin.kategori'))->assertOk();
    $this->get(route('user.dashboard'))->assertForbidden();
});

test('cashiers are sent to the minimarket dashboard and cannot open the admin dashboard', function () {
    $cashier = User::factory()->create(['role' => 'user']);

    $this->actingAs($cashier)
        ->get(route('dashboard'))
        ->assertRedirect(route('user.dashboard'));

    $this->get(route('user.dashboard'))->assertOk();
    $this->get(route('admin.dashboard'))->assertForbidden();
});
