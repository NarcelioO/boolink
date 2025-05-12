<?php

use App\Livewire\Link\Index;
use Livewire\Livewire;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('renders successfully', function () {

    $user = User::factory()->create();
    Livewire::actingAs($user)
        ->test(Index::class)
        ->assertStatus(200);
});

it('shows user links', function () {
    $user = User::factory()->create();
    
    $user->links()->create([
        'url' => 'https://example.com'
    ]);

    Livewire::actingAs($user)
        ->test(Index::class)
        ->assertSee('example.com');
});