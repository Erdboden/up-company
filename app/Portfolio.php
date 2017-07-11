<?php

namespace App;

use App\Presenters\PortfolioPresenter;
use App\Traits\Models\ConflictTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;
use Terranet\Presentable\PresentableInterface;
use Terranet\Presentable\PresentableTrait;
use Terranet\Translatable\Translatable;

class Portfolio extends Model implements PresentableInterface, Translatable, StaplerableInterface
{
    use PresentableTrait, ConflictTrait;

    protected $guarded = [];
    protected $fillable = ['company_id', 'photo', 'approved'];
    protected $translatedAttributes = ['title', 'body'];
    protected $presenter = PortfolioPresenter::class;

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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
