<?php

namespace App;


use App\Presenters\CompanyPresenter;
use Illuminate\Database\Eloquent\Model;
use Terranet\Presentable\PresentableInterface;
use Terranet\Presentable\PresentableTrait;

class Company extends Model implements PresentableInterface
{
    use PresentableTrait;
    protected $guarded = [];
    protected $with = ['owner', 'domain', 'portfolio'];
    protected $fillable = ['name', 'slogan', 'main_image_path', 'user_id', 'country', 'city', 'street'];
    protected $presenter = CompanyPresenter::class;
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return "/companies/{$this->slug}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @widget
     * @placement main-bottom
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function domain()
    {
        return $this->belongsToMany(Domain::class, 'company_domain');
    }

    /**
     * Has Many Relationship
     *
     * @widget
     */
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
