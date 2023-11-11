<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Inertia\Inertia;


class UserController extends Controller
{
    public function index(string $username)
    {
        $user = User::where('username', $username)->first();
        $posts = Post::where('created_by', $user->id)->with('author')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Posts', ['posts' => $posts, 'user' => $user]);
    }

    public function profile(string $username)
    {
        $user = User::where('username', $username)->first();
        return Inertia::render('Profile', ['user' => $user]);
    }
}
