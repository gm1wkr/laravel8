<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create',[
            'categories' => Category::all(),
        ]);
    }

    public function store(Post $post)
    {
        $attributes = $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/')->with('success', 'Post has been added');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);    
        
        return back()->with('success', 'Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'The post has been deleted.');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

       return request()->validate([
            'title'       => ['min:5', 'max:255', 'required'],
            'thumbnail'   => $post->exists ? ['image'] : [['required', 'image']],
            'slug'        => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt'     => ['min:5', 'max:1000', 'required'],
            'body'        => ['min:5', 'max:1000', 'required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
