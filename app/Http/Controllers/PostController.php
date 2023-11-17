<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Post::create([
            'content' => $request->content
        ]);

        return back()->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        $post = Post::with(['author', 'comments.author'])->find($post->id);
        return Inertia::render('Post/ShowPost', ['post' => $post]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return Inertia::render('Post/EditPost', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Post::find($post->id)->update(['content' => $request->content]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        Post::destroy($post->id);
        return redirect()->route('home');
    }
}
