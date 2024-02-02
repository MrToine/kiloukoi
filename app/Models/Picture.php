<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use League\Glide\Urls\UrlBuilderFactory;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
    ];

    protected static function booted(): void
    {
        static::deleted(function (Picture $picture) {
            Storage::disk('public')->delete($picture->filename);
        });
    }

    public function getUrl(?int $width = null, ?int $height = null) {
        if($width == null){
            return Storage::disk('public')->url($this->filename);
        }
        $urlBuilder = UrlBuilderFactory::create('/images/', config('glide.key'));
        return $urlBuilder->getUrl($this->filename, ['w' => $width, 'h' => $height, 'fit' => 'crop']);
    }
}
