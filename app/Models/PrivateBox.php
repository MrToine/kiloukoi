<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateBox extends Model
{
    use HasFactory;

    protected $table = 'private_box';

    protected $fillable = [
        'owner_id',
        'tenant_id',
        'announce_id',
        'owner_view',
        'tenant_view',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function ownerMessages()
    {
        return $this->hasMany(PrivateMessage::class);
    }

    public function tenantMessages()
    {
        return $this->hasMany(PrivateMessage::class);
    }

    public function announce()
    {
        return $this->belongsTo(Announce::class, 'announce_id');
    }

    public function messages()
    {
        return $this->hasMany(PrivateMessage::class, 'box_id');
    }
}
