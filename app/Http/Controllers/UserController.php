<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
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
        $post = Post::where('id', $post->id)->with('author','comments.author')->first();
        return Inertia::render('Post/ShowPost', ['post' => $post]);
    }

    public function profile(string $username)
    {
        $user = User::where('username', $username)->first();
        return Inertia::render('Profile', ['user' => $user]);
    }

    public function friends(string $username){
        $friends = '';
        return Inertia::render('Friends', ['friends' => $friends]);
    }

    public function followers(string $username){
        $followers = '';
        return Inertia::render('Followers', ['followers' => $followers]);
    }

    public function photos(string $username){
        $photos = '';
        return Inertia::render('photos', ['photos' => $photos]);
    }

    public function videos(string $username){
        $videos = '';
        return Inertia::render('videos', ['videos' => $videos]);
    }

    public function messages(string $username){
        $messages = '';
        return Inertia::render('messages', ['messages' => $messages]);
    }

    public function notifications(string $username){
        $notifications = '';
        return Inertia::render('notifications', ['notifications' => $notifications]);
    }
}
