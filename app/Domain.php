<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Terranet\Translatable\HasTranslations;
use Terranet\Translatable\Translatable;

class Domain extends Model implements Translatable
{
    use HasTranslations;
    protected $guarded = [];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['slug'];

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
