<?php

namespace App;


use App\Presenters\CompanyPresenter;
use App\Traits\CompanyTrait;
use App\Traits\Models\ConflictTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;
use Terranet\Presentable\PresentableInterface;
use Terranet\Presentable\PresentableTrait;
use Terranet\Translatable\Translatable;

class Company extends Model implements PresentableInterface, Translatable, StaplerableInterface
{
    use PresentableTrait, CompanyTrait, ConflictTrait;
    protected $guarded = [];
    protected $with = ['owner', 'domain', 'portfolio'];
    protected $fillable = ['name', 'photo', 'user_id', 'country', 'city', 'street', 'approved'];
    protected $translatedAttributes = ['slogan'];
    protected $presenter = CompanyPresenter::class;


    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('photo', [
            'styles' => [
                'thumb'  => '100x100',
                'medium' => '300x300',
            ],
        ]);

        parent::__construct($attributes);
    }

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

    /**
     * Has Many Relationship
     *
     * @widget
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getTotalScore()
    {

        if ($this->reviews->count() > 0) {
            $score = 0;
            foreach ($this->reviews as $review) {
                $score += $review->score->score_number;
            }

            return $score / $this->reviews->count();

        } else {
            return 0;
        }
    }
}
