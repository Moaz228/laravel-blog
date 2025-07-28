<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $post = Post::findOrFail($request->post_id);
        $comment = new Comment();
        $comment->content = $request->input('comment');
        $comment->author = $request->input('name');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect("/blog/{$post->id}")->with('success', 'You commented on the post!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('/blog');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
