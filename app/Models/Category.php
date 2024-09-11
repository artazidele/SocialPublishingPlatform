<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PostCategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function postCategories(): HasMany
    {
        return $this->hasMany(PostCategory::class, 'post_id');
    }
}
