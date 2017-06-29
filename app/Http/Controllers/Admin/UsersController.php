<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index');
    }
}
