<?php

namespace App\Http\Controllers;

use App\Company;
use App\Domain;
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

    public function index(Domain $domain)
    {

        $companies = $this->getCompanies($domain);
//        $companies = Company::latest();

        if (request()->wantsJson()) {
            return $companies;
        }

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

    public function destroy(Company $company)
    {
        $company->delete();
        if (request()->expectsJson()) {
            return response(['status' => 'company deleted']);
        }
        return back();
    }

    public function update(Company $company)
    {
//        $this->authorize('update', $reply);

        $this->validate(request(), [
            'name' => 'required',
            'domain' => 'required|exists:domains,id',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'slogan' => 'required'
        ]);


        $company->update([
            'name' => request('name'),
            'slug' => request('slug'),
            'domain_id' => request('domain'),
            'country' => request('country'),
            'city' => request('city'),
            'street' => request('street'),
            'main_image_path' => request('image') ?: 'http://lorempixel.com/100/100/',
            'slogan' => request('slogan'),
        ]);
    }

    protected function getCompanies(Domain $domain)
    {
        $companies = Company::latest();

        if ($domain->exists) {
            $companies->where('domain_id', $domain->id);
        }

        return $companies->get();
    }
}
