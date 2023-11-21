<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function posts(string $username)
    {
        $user = User::where('username', $username)->first();
        $posts = Post::with('author')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Timeline', ['posts' => $posts, 'user' => $user]);
    }

    public function post(string $username, post $post)
    {
        $post = Post::where('id', $post->id)->with('author', 'comments.author')->first();

        return Inertia::render('Post/ShowPost', ['post' => $post]);
    }

    public function about(string $username)
    {
        $user = User::where('username', $username)->first();

        return Inertia::render('About', ['user' => $user]);
    }

    public function friends(string $username)
    {
        $user = User::where('username', $username)->first();

        return Inertia::render('Friends', ['user' => $user]);
    }

    public function followers(string $username)
    {
        $user = User::where('username', $username)->first();

        return Inertia::render('Followers', ['user' => $user]);
    }

    public function photos(string $username)
    {
        $user = User::where('username', $username)->first();

        return Inertia::render('Photos', ['user' => $user]);
    }

    public function videos(string $username)
    {
        $user = User::where('username', $username)->first();

        return Inertia::render('Videos', ['user' => $user]);
    }

    public function messages(string $username)
    {
        $messages = '';

        return Inertia::render('Messages', ['messages' => $messages]);
    }

    public function notifications(string $username)
    {
        $notifications = '';

        return Inertia::render('Notifications', ['notifications' => $notifications]);
    }

    public function groups(string $username)
    {
        $user = User::where('username', $username)->first();

        return Inertia::render('Groups', ['user' => $user]);
    }
}
