<?php

namespace App\Traits;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Categorizable
{
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_announce');
    }
}
