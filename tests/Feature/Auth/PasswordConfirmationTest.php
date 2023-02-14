<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('displays the password confirmation page', function () {
    actingAs(User::factory()->create());

    get(route('password.confirm'))
        ->assertOk();
});

it('allows a user to proceed if they provide a correct password', function () {
    actingAs(User::factory()->create());

    post(route('password.confirm'), [
        'password' => 'password'
    ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();
});

it('does not allow a user to proceed if they provide an incorrect password', function () {
    actingAs(User::factory()->create());

    post(route('password.confirm'), [
        'password' => 'wrong-password'
    ])
        ->assertSessionHasErrors();
});
