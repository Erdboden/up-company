<?php

namespace App\Http\Terranet\Administrator\Savers;

use Terranet\Administrator\Services\Saver;

class Domains extends Saver
{
    public function sync()
    {
        # preserve parent functionality
        $domain       = parent::sync();
        $domain->slug = str_replace(' ', '-', $domain->name);
        $domain->save();
        return $domain;
    }
}