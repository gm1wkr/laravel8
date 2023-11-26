<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {   
        // dd(Gate::allows('admin'));
        // dd(request()->user()?->can('admin'));
        // dd($this->authorize('admin'));

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }
}
