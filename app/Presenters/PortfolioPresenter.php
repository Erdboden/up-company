<?php
/**
 * Created by PhpStorm.
 * User: Calculator
 * Date: 01.07.2017
 * Time: 16:29
 */

namespace App\Presenters;


use Terranet\Presentable\Presenter;

class PortfolioPresenter extends Presenter
{
    public function adminCompanyId()
    {
        $company = $this->presentable->company;
        return link_to_route('scaffold.view',
            $this->presentable->company->name,
            [
                'module' => 'companies',
                'id' => $company->id
            ]);
    }

    public function adminImagePath()
    {
        return '<img src="' . $this->presentable->image_path . '"/>';
    }
}