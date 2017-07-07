<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(Company $company)
    {
        return $company->reviews()->paginate(6);
    }
}
