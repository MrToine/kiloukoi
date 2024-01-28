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
        'tenant_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function announce()
    {
        return $this->belongsTo(Announce::class);
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }
}
