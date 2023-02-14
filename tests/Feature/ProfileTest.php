<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;

it('allows a user to view their profile page', function () {
    actingAs(User::factory()->create([
        'name' => 'Deven Jahnke',
        'email' => 'hello@devenjahnke.com'
    ]));

    get(route('profile.edit'))
        ->assertOk()
        ->assertSee('Deven Jahnke')
        ->assertSee('hello@devenjahnke.com');
});

it('allows a user to update their profile information', function () {
    $user = User::factory()->create();
    actingAs($user);

    $response = patch(route('profile.update'), [
        'name' => 'Test User',
        'email' => 'test@example.com',
    ])
    ->assertSessionHasNoErrors()
    ->assertRedirect(route('profile.edit'));

    expect($user->fresh())
        ->name->toEqual('Test User')
        ->email->toEqual('test@example.com')
        ->email_verified_at->toBeNull();
});
