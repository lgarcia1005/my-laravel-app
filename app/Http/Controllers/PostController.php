<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    //

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = Post::latest()->with(['author', 'category']);

        if (Request::get('search')) {
            $post
                ->where('title','like','%' . Request::get('search') . '%')
                ->orWhere('body','like','%' . Request::get('search') . '%');
        } else {
            $post->with(['author', 'category']);
        }

        return View::make('posts', [
            'posts' => $post->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return View::make('post', [
            'post' => $post
        ]);
    }
}
