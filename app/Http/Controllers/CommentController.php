<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get data from model
        $data = comment::all();

        // Send data to view
        return view('comment.index', ['comments' => $data, "pageTitle" => "Blog"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Comment::create([
            'content' => 'testing creating comments',
            'author' => 'Moaz',
            'post_id' => '0197fcb2-fae7-71de-a525-5a758e28271f'
        ]);
        return response("Successfull Creation", 201);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
