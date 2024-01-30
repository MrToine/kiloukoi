<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Announce;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'description',
        'registration_token',
        'is_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function announces()
    {
        return $this->hasMany(Announce::class);
    }

    public function locationRequests()
    {
        return $this->hasMany(LocationRequest::class);
    }


    public function ownerMessages()
    {
        return $this->hasMany(PrivateBox::class, 'owner_id');
    }

    public function tenantMessages()
    {
        return $this->hasMany(PrivateBox::class, 'tenant_id');
    }

    public function PrivateMessages()
    {
        return $this->hasMany(PrivateMessage::class, 'user_id');
    }

    public function unreadMessagesCount()
    {
        $ownerUnreadCount = $this->ownerMessages()->where('owner_view', false)->count();
        $tenantUnreadCount = $this->tenantMessages()->where('tenant_view', false)->count();

        return $ownerUnreadCount + $tenantUnreadCount;
    }
}
