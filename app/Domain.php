<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return "/domains/{$this->slug}";
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

}
