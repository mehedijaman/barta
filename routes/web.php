<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register')
//     ]);
// });

// Route::get('/login', function () {
//     return Inertia::render('Home');
// })->middleware(['auth', 'verified'])->name('message');

// Route::get('/message', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('message');


Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // User routes
    // Route::get('/{username}', [UserController::class, 'index'])->name('user.index');
    Route::get('/{username}/posts', [UserController::class, 'posts'])->name('user.posts');
    Route::get('/{username}/posts/{post}', [UserController::class, 'post'])->name('user.post');
    Route::get('/{username}/profile', [UserController::class, 'profile'])->name('user.profile');
    // Route::get('/{username}/messages', [UserController::class, 'messages'])->name('user.messages');
    // Route::get('/{username}/notifications', [UserController::class, 'notifications'])->name('user.notifications');
    // Route::get('/{username}/friends', [UserController::class, 'friends'])->name('user.friends');
    // Route::get('/{username}/followers', [UserController::class, 'followers'])->name('user.followers');
    // Route::get('/{username}/photos', [UserController::class, 'photos'])->name('user.photos');
    // Route::get('/{username}/videos', [UserController::class, 'videos'])->name('user.videos');
    // Route::get('/{username}/groups', [UserController::class, 'groups'])->name('user.groups');

    // Posts resource routes
    Route::get('/posts', [PostController::class, 'store'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'store'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
