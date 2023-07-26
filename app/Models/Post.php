<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'category',
        'author',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
