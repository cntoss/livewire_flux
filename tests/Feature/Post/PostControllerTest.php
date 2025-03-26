<?php

use App\Models\Post;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

/**
 *
 * This file contains feature tests for the PostController's CRUD operations.
 * These tests ensure that the PostController behaves as expected when
 * performing Create, Read, Update, and Delete actions.
 */
test('guest cannot access post creation screen', function () {
    $response = $this->get('blog-posts/create');
    $response->assertRedirect('login');
});

test('authenticated user can view post index', function () {
    $this->actingAs($user = User::factory()->create());
    $response = $this->get('blog-posts');
    $response->assertStatus(200);
});

test('authenticated user can create post', function () {
    $this->actingAs($user = User::factory()->create());

    $response = $this->post('blog-posts', [
        'title' => 'Test Title',
        'description' => 'Test Description'
    ]);
    $response->assertRedirect('blog-posts');
    $this->assertDatabaseHas('posts', [
        'title' => 'Test Title',
        'description' => 'Test Description'
    ]);
});

test('post creation validates required fields', function () {
    $this->actingAs($user = User::factory()->create());

    $response = $this->post('blog-posts', []);

    $response->assertSessionHasErrors(['title', 'description']);
});

test('authenticated user can update post', function () {
    $this->actingAs($user = User::factory()->create());
    $post = Post::factory()->create();

    $response = $this->put("blog-posts/{$post->id}", [
        'title' => 'Updated Title',
        'description' => 'Updated Description'
    ]);

    $response->assertRedirect('blog-posts');
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Updated Title',
        'description' => 'Updated Description'
    ]);
});

test('authenticated user can delete post', function () {
    $this->actingAs($user = User::factory()->create());
    $post = Post::factory()->create();

    $response = $this->delete("blog-posts/{$post->id}");

    $response->assertRedirect('blog-posts');
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});

test('unauthenticated user cannot access edit form', function () {
    $post = Post::factory()->create();

    $response = $this->get("blog-posts/{$post->id}/edit");
    $response->assertRedirect('login');
});