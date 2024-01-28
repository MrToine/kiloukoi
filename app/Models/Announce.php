<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\User;
use App\Models\Option;
use App\Models\Category;
use App\Models\LocationRequests;

class Announce extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'adress',
        'postalcode',
        'city',
        'availability',
        'user_id',
    ];

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class, 'option_announce');
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'category_announce');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locationRequests(): HasMany {
        return $this->hasMany(LocationRequest::class);
    }

    public function getSlug(): String {
        return Str::slug($this->title);
    }
}
