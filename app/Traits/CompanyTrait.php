<?php
/**
 * Created by PhpStorm.
 * User: Calculator
 * Date: 02.07.2017
 * Time: 12:22
 */

namespace App\Traits;


trait CompanyTrait
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return "/companies/{$this->slug}";
    }
}