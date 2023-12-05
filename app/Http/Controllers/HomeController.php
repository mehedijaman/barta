<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['author.media', 'media', 'comments.author'])
            ->latest()
            ->get();

        return Inertia::render('Home', ['posts' => $posts]);
    }

    public function search(string $searchText)
    {
        $posts = Post::Where('content', 'like', '%'.$searchText.'%')
            ->with(['author', 'media', 'comments.author'])
            ->latest()
            ->get();

        $users = User::where('name', 'like', '%'.$searchText.'%')
            ->orWhere('email', '=', $searchText)
            ->get();

        return inertia('SearchResult', ['posts' => $posts, 'users' => $users]);
    }
}
