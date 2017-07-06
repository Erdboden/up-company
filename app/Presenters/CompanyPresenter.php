<?php

namespace App\Presenters;

use function admin\output\label;
use Terranet\Presentable\Presenter;

/**
 * Created by PhpStorm.
 * User: Calculator
 * Date: 30.06.2017
 * Time: 22:02
 */

/** @class App\Presenters\CompanyPresenter */
class CompanyPresenter extends Presenter
{

    public function adminUserId()
    {
        if ($owner = $this->presentable->owner) {
            return link_to_route('scaffold.view',
                $owner->name,
                [
                    'module' => 'users',
                    'id' => $owner->id
                ]);
        }
    }

    public function adminSlogan()
    {
        return '<p>' . $this->presentable->slogan . '</p>';
    }

    public function adminCity()
    {
        return label($city = $this->presentable->city, 'label-primary');
    }

    public function adminCountry()
    {
        return label($this->presentable->country, 'label-primary');
    }

    public function adminStreet()
    {
        return label($this->presentable->street, 'label-primary');
    }
//
//    public function adminMainImagePath()
//    {
//        return '<img src="' . $this->presentable->main_image_path . '"/>';
//    }

    public function adminDomain()
    {
        $domains = $this->domain;
        return view('admin.companies.company-domain', compact('domains'));
    }

    public function adminPortfolio()
    {
        $portfolio = $this->portfolio;
        return view ('admin.companies.company-portfolio', compact('portfolio'));
    }


}