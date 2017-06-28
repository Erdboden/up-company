<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    /**
     * ProfilesController constructor.
     */
    public function __construct()
    {
        $this->middleware('profile');
    }

    public function show(User $user)
    {

        if (request()->expectsJson()) {
            return $user->userCompanies;
        }
        return view('profiles.show', ['userProfile' => $user->userCompanies]);
    }
}
