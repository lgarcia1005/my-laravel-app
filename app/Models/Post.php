<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body'
    ];

    protected $with = [
        'category',
        'author'
    ];

    public function scopeFilter($query, array $filters): void
    {
        $query
            ->when($filters['search'] ?? false, function ($query, $search) {
                $query
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', "%{$search}%")
                            ->orWhere('body', 'like', "%{$search}%");
                    });
            })
            ->when($filters['category'] ?? false, function ($query, $category) {
                $query->whereRelation('category', 'slug', $category);
            })
            ->when($filters['author'] ?? false, function ($query, $author) {
                $query->whereRelation('author', 'username', $author);
            });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
}
