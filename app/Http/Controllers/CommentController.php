<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $post_id;
        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->back();
    }
}
