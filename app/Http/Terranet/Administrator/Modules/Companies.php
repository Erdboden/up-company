<?php

namespace App\Http\Terranet\Administrator\Modules;

use App\Domain;
use App\Http\Terranet\Administrator\Widgets\CompanyPortfolio;
use App\User;
use Terranet\Administrator\Collection\Group;
use Terranet\Administrator\Columns\Element;
use Terranet\Administrator\Contracts\Module\Editable;
use Terranet\Administrator\Contracts\Module\Exportable;
use Terranet\Administrator\Contracts\Module\Filtrable;
use Terranet\Administrator\Contracts\Module\Navigable;
use Terranet\Administrator\Contracts\Module\Sortable;
use Terranet\Administrator\Contracts\Module\Validable;
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
//    public function form()
//    {
//        return $this
//            ->scaffoldForm()
//            # Update existing column

//    }

    public function columns()
    {
        return
//            # preserve auto-discovered columns
            $this
                ->scaffoldColumns()
//                ->without('user_id')
//                # Add a group of new elements
////                ->group('Location', function (Group $group) {
////                    # Note that .dot notation means relationship, like $post->meta->keywords
////                    $group->push(new Element('country'));
////                    $group->push(new Element('city'));
////                    $group->push(new Element('street'));
////                });
//                # Join existing elements to a group
                ->join(['country', 'city', 'street'], 'location')
                ->move('location', 'before:dates');
//                ->update('location', function ($group) {
//                    return $group->move('city', 'before:country');
//                })
//            ->push(new \Terranet\Administrator\Columns\Element('portfolio'));
//
    }

    public function widgets()
    {
        $portfolio = app('scaffold.model');
//
            $this->scaffoldWidgets()
                ->push($portfolio);


    }


}