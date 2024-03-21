<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maj extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
    ];
}
