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
        $companies = Company::all();


        return view('company.index', ['userName' => $userName, 'companies' => $companies]);
    }
    public function edit()
    {

    }

    public function optAdd()
    {
        $company = new Company;
        $company->name = "Demo company 1";
        $company->description = "Descripción company 1";
        $company->user_id = 1;
        $company->save();

        $company = new Company;
        $company->name = "Demo company 2";
        $company->description = "Descripción company 2";
        $company->user_id = 1;
        $company->save();

        $userName = '';
        
        return view('company.index', ['userName' => $userName]);
    }

}
