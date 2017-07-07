<?php

namespace App\Http\Controllers;

use App\Company;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index(Company $company)
    {
//        return $company->portfolio()->get();
        return $company->portfolio()->paginate(6);
    }

    public function store($companySlug)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);
        $company = Company::where('slug', $companySlug)->first();
        Portfolio::create([
            'title' => request('title'),
            'image_path' => request('image'),
            'body' => request('body'),
            'company_id' => $company->id
        ]);
    }

    public function update($companySlug, Portfolio $portfolio)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        $portfolio->update([
            'title' => request('title'),
            'image_path' => request('image'),
            'body' => request('body'),
        ]);

    }

    public function destroy($companySlug, Portfolio $portfolio)
    {
        $portfolio->delete();
        if (request()->expectsJson()) {
            return response(['status' => 'portfolio deleted']);
        }
        return back();
    }
}
