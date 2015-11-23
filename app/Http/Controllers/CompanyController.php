<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Company;

class CompanyController extends BaseController
{
    public function index()
    {
        $userName = Auth::user()->name;

        // $company = new Company;
        // $company->name = 'Name1';
        // $company->description = 'Description1';
        // $company->user_id = 1;
        // $company->save();
        //
        // $companies = Company::all();


        return view('company.index', ['userName' => $userName, 'companies' => $companies]);
    }
    public function edit()
    {

    }

}
