<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $guarded = [];
    protected $with = ['owner', 'domain'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return "/companies/{$this->domain->slug}/{$this->slug}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}
