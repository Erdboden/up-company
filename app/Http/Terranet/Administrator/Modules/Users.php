<?php

namespace App\Http\Terranet\Administrator\Modules;

use App\Role;
use Terranet\Administrator\Collection\Group;
use Terranet\Administrator\Columns\Element;
use Terranet\Administrator\Form\FormElement;
use Terranet\Administrator\Form\Type\Password;
use Terranet\Administrator\Form\Type\Select;
use Terranet\Administrator\Modules\Users as CoreUsersModule;

/**
 * Administrator Users Module
 *
 * @package Terranet\Administrator
 */
class Users extends CoreUsersModule
{


    public function form()
    {
        $roles = FormElement::multiCheckbox('roles.role_id');
        $roles->getInput()->setOptions(
            Role::pluck('name', 'id')->toArray()
        );
        $roles->setTitle('Roles');

        return $this->scaffoldForm()
            ->push($roles);
    }

}
