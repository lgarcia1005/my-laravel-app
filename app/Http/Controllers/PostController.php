<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //

    public function store(Request $request, Post $post)
    {

        $rules = [
            'title' => ['required', 'min:5', 'max:255'],
            'excerpt' => ['required', 'min:6', 'max:255'],
            'body' => ['required', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => ['required', 'image'],
        ];

        $validatedData = $request->validate($rules);

        $submitData = [
            'title' => $validatedData['title'],
            'excerpt' => $validatedData['excerpt'],
            'body' => $validatedData['body'],
            'category_id' => $validatedData['category_id'],
            'user_id' => $request->user()->id,
            'slug' => $validatedData['slug'],
            'thumbnail' => $request->file('thumbnail')->store('thumbnails'),
        ];

        $post->create($submitData);

        return to_route('home')->with('success', 'Published Complete');
    }

    public function create(Category $category)
    {
        return View::make('posts.create', [
            'categories' => $category->all(),
        ]);
    }

    public function index(Post $post, Request $request)
    {
        $posts = $post->latest()->filter(
            $request->only(['search', 'category', 'author'])
        )->paginate(6)->onEachSide(1)->withQueryString();

        return View::make('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->simplePaginate(5);

        return View::make('posts.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
}
