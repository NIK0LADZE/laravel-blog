<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'body' => ['required']
        ]);

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->input('body')
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $commentId = $request->input('comment_id');

        $comment = $request->user()->comments()->find($commentId);

        if (!$comment) {
            abort(401);
        }

        $comment->delete();
        return back();
    }
}
