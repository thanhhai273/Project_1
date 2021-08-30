<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the links associated with a user
     *
     * @return Relationship
     */
    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function visits()
    {
        return $this->hasManyThrough(Visit::class, Link::class);
    }

    public function getRouteKeyName() {
        return 'name';
    }
}
