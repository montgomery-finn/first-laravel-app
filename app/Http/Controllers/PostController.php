<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts' => Post::latest()
                            ->filter(request(['search', 'category', 'author']))
                            ->with('category', 'author')->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show.index', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(){

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            //'slug' => ['required' | Rule::unique('posts', 'slug')],
            'slug' => ['required'],
            'excerpt' => 'required',
            'body' => 'required',
            //'category_id' => ['required' | Rule::exists('categories', 'id')]
            'category_id' => ['required']
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }
}
