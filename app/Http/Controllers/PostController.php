<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action');
        }
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action');
        }
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
