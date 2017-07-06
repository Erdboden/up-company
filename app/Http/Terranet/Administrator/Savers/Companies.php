<?php

namespace App\Http\Terranet\Administrator\Savers;

use Terranet\Administrator\Services\Saver;

class Companies extends Saver
{
    public function sync()
    {
        # preserve parent functionality
        $company       = parent::sync();
        $company->slug = str_replace(' ', '-', $company->name);
        $company->save();
        return $company;
    }
}