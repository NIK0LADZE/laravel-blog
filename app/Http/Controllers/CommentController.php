<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

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
    public function destroy(User $author, Request $request)
    {
        $commentId = $request->input('comment_id');

        $comment = $author->comments()->find($commentId);

        if (!$comment) {
            abort(401);
        }

        $comment->delete();
        return back();
    }
}
