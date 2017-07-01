<?php

namespace App\Http\Terranet\Administrator\Modules;

use App\Role;
use Terranet\Administrator\Collection\Group;
use Terranet\Administrator\Columns\Element;
use Terranet\Administrator\Form\Type\Select;
use Terranet\Administrator\Modules\Users as CoreUsersModule;

/**
 * Administrator Users Module
 *
 * @package Terranet\Administrator
 */
class Users extends CoreUsersModule
{


//    public function form()
//    {
//        return $this
//            ->scaffoldForm()
//            # Update existing column
//            ->update('role', function ($element) {
//                # Set a different input type
//                $element->setInput(
//                    new Select('role_id')
//                );
//
//                # set dropdown options
//                $element->getInput()->setOptions(
//                    Role::pluck('name', 'id')->toArray()
//                );
//
//                return $element;
//            });
//    }

}
