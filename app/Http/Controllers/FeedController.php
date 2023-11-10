<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function index(){
        $posts = Post::all();
        return Inertia::render('Dashboard', ['posts' => $posts]);
    }
}
