<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['author','comments.author'])->orderBy('created_at', 'desc')->paginate();

        if($request->wantsJson()){
            error_log('Request wants JSON');
            return [];
        }

        return Inertia::render('Home', ['posts' => $posts]);
    }
}
