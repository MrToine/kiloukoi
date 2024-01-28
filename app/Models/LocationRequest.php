<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'announce_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function annonce()
    {
        return $this->belongsTo(Announce::class);
    }
}
