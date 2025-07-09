<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
    {
        // Get data from model
        $data = Tag::all();

        // Send data to view
        return view('tag.index', ['tags' => $data, "pageTitle" => "Tags"]);
    }

    function create()
    {
        Tag::create([
            'title' => "Computer Science"
        ]);
        return redirect('/tags');
    }


    function testManyToMany()
    {
        $post1 = Post::find(1);
        $post3 = Post::find(3);

        $post1->tags()->attach([1, 2]);
        $post3->tags()->attach([1]);

        return response()->json(([
            'post1' => $post1->tags,
            'post3' => $post3->tags
        ]));
    }

    function delete(){
        Post::destroy(1);
        Post::destroy(2);
    }
}
