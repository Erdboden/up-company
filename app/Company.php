<?php

namespace App;


use App\Presenters\CompanyPresenter;
use App\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;
use Terranet\Presentable\PresentableInterface;
use Terranet\Presentable\PresentableTrait;

class Company extends Model implements PresentableInterface
{
    use PresentableTrait, CompanyTrait;
    protected $guarded = [];
    protected $with = ['owner', 'domain', 'portfolio'];
    protected $fillable = ['name', 'slogan', 'main_image_path', 'user_id', 'country', 'city', 'street'];
    protected $presenter = CompanyPresenter::class;


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
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
