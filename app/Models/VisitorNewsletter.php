<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorNewsletter extends Model
{
    use HasFactory;

    protected $table = 'visitors_newsletters';

    protected $fillable = [
        'email',
    ];
}
