<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{

    /**
     * CompaniesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $companies = Company::latest()->get();
        return view('companies.index', compact('companies'));
    }

    public function show($domain, Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'domain_id' => 'required|exists:domains,id'
        ]);

        $company = Company::create([
            'name' => request('name'),
            'slug' => str_replace(' ', '-', request('name')),
            'country' => request('country'),
            'city' => request('city'),
            'street' => request('street'),
            'slogan' => request('slogan'),
            'user_id' => auth()->id(),
            'domain_id' => request('domain_id'),
            'main_image_path' => request('main_image_path') ?: 'http://lorempixel.com/100/100/'
        ]);
        return redirect($company->path());
//            ->with('flash', 'Your thread has been published.');
    }
}
