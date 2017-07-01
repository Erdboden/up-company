<?php

namespace App\Http\Terranet\Administrator\Modules;

use App\Company;
use App\User;
use Terranet\Administrator\Contracts\Module\Editable;
use Terranet\Administrator\Contracts\Module\Exportable;
use Terranet\Administrator\Contracts\Module\Filtrable;
use Terranet\Administrator\Contracts\Module\Navigable;
use Terranet\Administrator\Contracts\Module\Sortable;
use Terranet\Administrator\Contracts\Module\Validable;
use Terranet\Administrator\Form\Type\Select;
use Terranet\Administrator\Form\Type\Tinymce;
use Terranet\Administrator\Scaffolding;
use Terranet\Administrator\Traits\Module\AllowFormats;
use Terranet\Administrator\Traits\Module\AllowsNavigation;
use Terranet\Administrator\Traits\Module\HasFilters;
use Terranet\Administrator\Traits\Module\HasForm;
use Terranet\Administrator\Traits\Module\HasSortable;
use Terranet\Administrator\Traits\Module\ValidatesForm;

/**
 * Administrator Resource Portfolios
 *
 * @package Terranet\Administrator
 */
class Portfolios extends Scaffolding implements Navigable, Filtrable, Editable, Validable, Sortable, Exportable
{
    use HasFilters, HasForm, HasSortable, ValidatesForm, AllowFormats, AllowsNavigation;

    /**
     * The module Eloquent model
     *
     * @var string
     */
    protected $model = 'App\\Portfolio';


    public function form()
    {

        return $this
            ->scaffoldForm()
            # Update existing column
            ->update('company_id', function ($element) {
                # Set a different input type
                $element->setInput(
                    new Select('company_id')
                );

                # set dropdown options
                $element->getInput()->setOptions(
                    Company::pluck('name', 'id')->toArray()
                );

                return $element;
            })->update('body', function ($element) {
                $element->setInput(new Tinymce('body'));
            });
    }
}