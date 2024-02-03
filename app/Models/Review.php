<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'announce_id',
        'user_id',
        'note',
        'comment'
    ];

    public function announce()
    {
        return $this->belongsTo(Announce::class);
    }

    public function user() {
        return $this->BelongsTo(User::class);
    }
}
