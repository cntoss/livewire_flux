<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Localization;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['web', 'auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('settings/localization', Localization::class)->name('settings.localization');

    Route::get('posts', \App\Livewire\Posts\Index::class)->name('posts.index');
    Route::get('posts/create', \App\Livewire\Posts\Create::class)->name('posts.create');
    Route::get('posts/edit/{post}', \App\Livewire\Posts\Edit::class)->name('posts.edit');

    Route::get('comments', \App\Livewire\Comments\Index::class)->name('comments.index');
    Route::get('comments/create', \App\Livewire\comments\Create::class)->name('comments.create');
    Route::get('comments/edit/{comment}', \App\Livewire\comments\Edit::class)->name('comments.edit');

    Route::resource('blog-posts', PostController::class);
    // Route::resource('laravel/posts', PostController::class);
    // Route::resource('laravel/comments', CommentController::class);

});

require __DIR__ . '/auth.php';
