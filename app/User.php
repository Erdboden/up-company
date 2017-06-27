<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role_id'
    ];
//    protected $with = ['companies'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function getUserCompaniesAttribute()
    {
        return $this->companies()->where('user_id', auth()->id())->get();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
