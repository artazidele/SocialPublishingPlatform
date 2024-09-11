<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Comment;
use App\Models\PostCategory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'username',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'username');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function postCategories(): HasMany
    {
        return $this->hasMany(PostCategory::class, 'post_id');
    }
}
