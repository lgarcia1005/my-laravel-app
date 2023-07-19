<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    //

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
