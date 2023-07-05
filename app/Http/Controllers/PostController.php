<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    //

    public function index()
    {
        return View::make('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->onEachSide(1)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return View::make('posts.show', [
            'post' => $post
        ]);
    }
}
