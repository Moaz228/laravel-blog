<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index(){
        // Get data from model
        $data = comment::all();

        // Send data to view
        return view('comment.index', ['comments' => $data, "pageTitle" => "Blog"]);
    }

    function create(){
        Comment::create([
            'content' => 'testing creating comments',
            'author' => 'Moaz',
            'post_id' => 2
        ]);
        return redirect('/comments');
    }
}
