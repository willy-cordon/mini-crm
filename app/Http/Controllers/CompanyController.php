<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    private $companyService;
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        $companies = Company::names($name)->paginate(10);
        return view('companies.index',compact('companies'));
    }

    public function create()
    {
        $action =  route("admin.companies.store");
        $method = 'POST';

        return view('companies.create_edit',compact('action','method'));
    }
//
//
    public function store(CompanyRequest $request)
    {

        $this->companyService->create($request);
        return redirect()->route('admin.companies.index');
    }


    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show', compact('company'));
    }


    public function edit(Company $company)
    {

        $action = route("admin.companies.update",[$company->id]);
        $method = 'PUT';
        return view('companies.create_edit', compact('company','action','method'));
    }


    public function update(Request $request,Company $company)
    {
        $this->companyService->update($company,$request);
        return redirect()->route('admin.companies.index');
    }


    public function destroy(Company $company)
    {
        $this->companyService->destroy($company);
        return redirect()->route('admin.companies.index');
    }

}
