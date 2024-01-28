<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    use HasFactory;

    protected $table = 'messages_private_box';

    protected $fillable = [
        'owner_id',
        'tenant_id',
        'announce_id',
        'owner_view',
        'tenant_view',
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
