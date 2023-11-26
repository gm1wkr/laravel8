<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        // Validation
        request()->validate([
            'body' => ['min:5', 'max:1000', 'required'],
        ]);

        // Create
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body'),
        ]);

        return back()->with('success', 'Comment has been added, thanks.');
    }
}
