<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public function __construct(public $title,
                                public $excerpt,
                                public $date,
                                public $body,
                                public $slug)
    {
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $post = static::all()->firstWhere('slug', $slug);

        if(! $post){
            throw new ModelNotFoundException();
        }

        return $post;
    }

    public static function all()
    {

        return Cache::rememberForever('posts.all', function () {
            return Collection::make(File::files(resource_path('posts')))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($doc) => new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->body(),
                    $doc->slug
                ))
                ->sortByDesc('date');
        });
    }
}
