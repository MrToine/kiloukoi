<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Option;
use App\Models\Category;
use App\Models\Picture;
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
        'check_moderation',
    ];

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class, 'option_announce');
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'category_announce');
    }

    public function pictures(): HasMany {
        return $this->hasMany(Picture::class);
    }

    public function getFirstPicture(): ?Picture {
        return $this->pictures[0] ?? null;
    }

    /**
     * @param UploadedFile[] $files
     */
    public function attachFiles(array $files) {
        $pictures = [];
        foreach($files as $file) {
            if($file->getError()) {
                continue;
            }
            $filename = $file->store('announces/' . $this->id, 'public');

            $pictures[] = [
                'filename' => $filename
            ];
        }
        if (count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function privateBox()
    {
        return $this->hasOne(PrivateBox::class, 'announce_id');
    }

    public function locationRequests(): HasMany {
        return $this->hasMany(LocationRequest::class);
    }

    public function getSlug(): String {
        return Str::slug($this->title);
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'announce_id');
    }

    public function review(): BelongsToMany {
        return $this->belongsToMany(Review::class, 'announce_id');
    }
}
