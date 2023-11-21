<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['author', 'comments.author'])->orderBy('created_at', 'desc')->get();

        return Inertia::render('Home', ['posts' => $posts]);
    }
}
