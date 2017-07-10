<?php

namespace App\Http\Controllers;

use App\Company;
use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

        if (request()->wantsJson()) {
            return $companies;
        }

        return view('companies.index', compact('companies'));
    }


    public function show(Company $company)
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
//            'domain_id' => request('domain_id'),
            'main_image_path' => request('main_image_path') ?: 'http://lorempixel.com/100/100/'
        ]);
        $company->domain()->attach(request('domain_id'));
        return redirect($company->path());
    }

    public function destroy(Company $company)
    {
        $this->authorize('update', $company);
        $company->delete();
        if (request()->expectsJson()) {
            return response(['status' => 'company deleted']);
        }
        return back();
    }

    public function update(Company $company)
    {
        $this->authorize('update', $company);

        $this->validate(request(), [
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'slogan' => 'required'
        ]);


        $company->update([
            'name' => request('name'),
            'slug' => request('slug'),
            'country' => request('country'),
            'city' => request('city'),
            'street' => request('street'),
            'main_image_path' => request('image') ?: 'http://lorempixel.com/100/100/',
            'slogan' => request('slogan'),
        ]);
        $company->domain()->attach(request('selectedDomain'));
    }

    public function destroyDomain(Company $company)
    {
        $this->authorize('update', $company);
        return $company->domain()->detach(request('domain'));

    }

    protected function getCompanies(Domain $domain)
    {

        $companies = Company::latest();
        if ($domain->exists) {
            $companies = $domain->companies;
            return $companies;
        }


        return $companies->get();
    }
}
