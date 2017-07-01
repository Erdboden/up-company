<?php

namespace App\Http\Terranet\Administrator\Modules;

use App\Domain;
use App\User;
use Terranet\Administrator\Contracts\Module\Editable;
use Terranet\Administrator\Contracts\Module\Exportable;
use Terranet\Administrator\Contracts\Module\Filtrable;
use Terranet\Administrator\Contracts\Module\Navigable;
use Terranet\Administrator\Contracts\Module\Sortable;
use Terranet\Administrator\Contracts\Module\Validable;
use Terranet\Administrator\Filters\FilterElement;
use Terranet\Administrator\Form\FormElement;
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
 * Administrator Resource Companies
 *
 * @package Terranet\Administrator
 */
class Companies extends Scaffolding implements Navigable, Filtrable, Editable, Validable, Sortable, Exportable
{
    use HasFilters, HasForm, HasSortable, ValidatesForm, AllowFormats, AllowsNavigation;

    /**
     * The module Eloquent model
     *
     * @var string
     */
    protected $model = 'App\\Company';

    public function form()
    {
        $domains = FormElement::multiCheckbox('domain.domain_id');
        $domains->getInput()->setOptions(
            Domain::pluck('name', 'id')->toArray()
        );
        $domains->setTitle('Domains');
        return $this->scaffoldForm()
            ->push($domains)
            ->update('user_id', function ($element) {
                # Set a different input type
                $element->setInput(
                    new Select('user_id')
                );
                # set dropdown options
                $element->getInput()->setOptions(
                    User::pluck('email', 'id')->toArray()
                );
                return $element;

            })->update('slogan', function ($element) {
                $element->setInput(new Tinymce('slogan'));
            });
    }

    public function columns()
    {
        return
            $this
                ->scaffoldColumns()
                ->update('user_id', function($element){
                    $element->setTitle('Owner');
                })
//                # Join existing elements to a group
                ->join(['user_id', 'country', 'city', 'street'], 'Info')
                ->move('info', 'before:dates')
                ->push(new \Terranet\Administrator\Columns\Element('domain'));
    }

    public function filters()
    {
        return $this
            # Preserve auto-discovered filters
            ->scaffoldFilters()
            # let's filter our collection by user_id column
            ->push(
                FilterElement::select('user_id', [], $this->users())
            )# optionaly for foreign columns we can define a custom query
            ->update('user_id', function ($userId) {
                $userId
                    ->getInput()
                    ->setQuery(function ($query, $value) {
                        return $query->whereIn('user_id', [$value]);
                    });

                return $userId;
            });
    }

    protected function users()
    {
        return ['' => '--Any--'] + User::pluck('email', 'id')->toArray();
    }

}