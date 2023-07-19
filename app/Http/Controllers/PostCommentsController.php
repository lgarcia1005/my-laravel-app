<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $rules = [
            'body' => ['required', 'max:255'],
        ];

        $validatedData = $request->validate($rules);

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $validatedData['body'],
        ]);

        return back()->with('success', 'You Added a Comment');
    }
}
