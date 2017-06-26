<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
//        dd($user->userCompanies);
        if (request()->expectsJson()) {
            return $user->userCompanies;
        }
        return view('profiles.show', ['userProfile' => $user->userCompanies]);
    }
}
