<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['author', 'media', 'comments.author'])
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Home', ['posts' => $posts]);
    }

    public function search(string $searchText)
    {
        $posts = Post::Where('content', 'like', '%'.$searchText.'%')
            ->with(['author', 'media', 'comments.author'])
            ->get();

        $users = User::where('name', 'like', '%'.$searchText.'%')
            ->orWhere('email', '=', $searchText)
            ->get();

        return inertia('SearchResult', ['posts' => $posts, 'users' => $users]);
    }
}
