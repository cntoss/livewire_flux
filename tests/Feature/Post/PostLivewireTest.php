<?php

use App\Livewire\Auth\Register;
use App\Livewire\Posts\Create;
use App\Livewire\Posts\Edit;
use App\Livewire\Posts\Index;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

// Tests for Livewire CRUD operations on posts
test('guest cannot access post creation screen', function () {
    $response = $this->get('posts');
    $response->assertRedirect('login');
});

test('authenticated user can view post index', function () {
    $this->actingAs($user = User::factory()->create());
    $response = $this->get('posts');
    $response->assertStatus(200);
});

test("post creation requires title and description", function () {
    $this->actingAs($user = User::factory()->create());
    Livewire::test(Create::class)
        ->call('save')
        ->assertHasErrors(['title', 'description']);
});

test('new post can create', function () {
    $this->actingAs($user = User::factory()->create());
    $response = Livewire::test(Create::class)
        ->set('title', 'Something Big')
        ->set('description', 'Big news coming soon')
        ->call('save');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('posts.index', absolute: false));
    $this->assertAuthenticated();
});
test('post title must be at least 3 characters', function () {
    $this->actingAs($user = User::factory()->create());
    Livewire::test(Create::class)
        ->set('title', 'Hi')
        ->set('description', 'Valid description')
        ->call('save')
        ->assertHasErrors(['title' => 'min']);
});

test('authenticated user can edit a post', function () {
    $this->actingAs($user = User::factory()->create());
    $post = Post::factory()->create();
    Livewire::test(Edit::class, ['post' => $post])
        ->set('title', 'Update title')
        ->set('description', 'Update description')
        ->call('save')
        ->assertHasNoErrors()
        ->assertRedirectToRoute('posts.index');
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Update title',
        'description' => 'Update description'
    ]);
});

test('authenticated user can delete a post', function () {
    $this->actingAs($user = User::factory()->create());
    $post = Post::factory()->create();
    Livewire::test(Index::class, ['post' => $post])
        ->call('delete', $post->id);

    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});

test('unauthenticated user cannot edit a post', function () {
    $post = Post::factory()->create();

    $response = Livewire::test(Edit::class, ['post' => $post]);
    $response->assertRedirect('login');
});