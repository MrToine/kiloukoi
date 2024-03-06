<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use App\Traits\Categorizable;

use App\Models\User;
use App\Models\Option;
use App\Models\Category;

class AnnounceRequest extends Model
{
    use HasFactory;
    use Categorizable;

    protected $fillable = [
        'title',
        'price',
        'description',
        'adress',
        'postalcode',
        'city',
        'availability',
        'user_id',
        'check_moderation',
    ];

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class, 'option_announce');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSlug(): String {
        return Str::slug($this->title);
    }
}
