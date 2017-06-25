<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index($domainId, Company $company)
    {
        return $company->portfolio()->get();
    }
}
