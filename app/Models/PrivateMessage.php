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
        'content'
    ];

    public function privateBox()
    {
        return $this->belongsTo(PrivateBox::class, 'box_id');
    }

    public function privateMessage()
    {
        return $this->hasOne(User::class, 'id');
    }
}
