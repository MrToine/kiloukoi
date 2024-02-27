<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNewsletter extends Model
{
    use HasFactory;

    protected $table = 'users_newsletters';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
