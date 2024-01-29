<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    use HasFactory;

    protected $table = 'messages_private_box';

    protected $fillable = [
        'user_id',
        'box_id',
        'message'
    ];

    public function privateBox()
    {
        return $this->belongsTo(PrivateBox::class, 'box_id');
    }

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
