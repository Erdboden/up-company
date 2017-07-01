<?php

namespace App;

use App\Presenters\PortfolioPresenter;
use Illuminate\Database\Eloquent\Model;
use Terranet\Presentable\PresentableInterface;
use Terranet\Presentable\PresentableTrait;

class Portfolio extends Model implements PresentableInterface
{
    use PresentableTrait;

    protected $guarded = [];
    protected $fillable = ['company_id', 'title', 'image_path','body'];
    protected $presenter = PortfolioPresenter::class;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
