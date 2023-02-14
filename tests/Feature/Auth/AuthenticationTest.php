<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('displays the login page', function () {
   get(route('login'))
       ->assertOk();
});

it('authenticates a user with valid credentials', function () {
    $user = User::factory()->create();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])
        ->assertRedirect(RouteServiceProvider::HOME);

    assertAuthenticated();
});

it('does not authenticate a user with invalid credentials', function () {
    $user = User::factory()->create();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    assertGuest();
});
