<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get data from model
        $data = Post::latest()->cursorPaginate(5);

        // Send data to view
        return view('post.index', ['posts' => $data, "pageTitle" => "Blog"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ["pageTitle" => "Create New Post"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('post-title');
        $post->body = $request->input('body');
        $post->published = true;
        $post->user_id = Auth::id();

        $post->save();

        return redirect('/blog')->with('success', 'Post published!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post, "pageTitle" => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', ["post" => $post, "pageTitle" => "Edit Post: " . $post->title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, Post $post)
    {
        $post->title = $request->input('post-title');
        $post->body = $request->input('body');
        $post->published = true;

        $post->save();

        return redirect('/blog')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog')->with('success', 'Post deleted successfully!');
    }
}
