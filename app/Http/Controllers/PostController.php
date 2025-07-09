<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        // Get data from model
        $data = Post::all();

        // Send data to view
        return view('post.index', ['posts' => $data, "pageTitle" => "Blog"]);
    }

    function show($id){
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, "pageTitle" => $post->title]);
    }

    function create(){
        Post::create([
            'title' => "Second post",
            'body' => 'testing creating posts',
            'published' => true,
            'author' => 'Moaz'
        ]);
        return redirect('/blog');
    }

    function delete(){
        Post::destroy(2);
    }
}
