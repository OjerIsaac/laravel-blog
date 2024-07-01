<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Ensure that only authenticated users can access comment functionalities.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created comment for the specified post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment($request->all());

        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();

        $comment->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Comment added successfully.');
    }
}

