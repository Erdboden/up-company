<?php

namespace App\Http\Terranet\Administrator\Savers;

use Terranet\Administrator\Services\Saver;

class Companies extends Saver
{
    public function sync()
    {
        # preserve parent functionality
        $company       = parent::sync();
        $slug          = str_replace(' ', '-', $company->name);
        $company->slug = strtolower($slug);
        $company->save();

        return $company;
    }
}