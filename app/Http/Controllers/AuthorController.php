<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;

class AuthorController extends Controller
{
    public function author(User $author)
    {
        return view('posts.index', [
            'posts' => $author->posts,
        ]);
    }
}
