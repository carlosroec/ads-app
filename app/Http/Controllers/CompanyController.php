<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Company;
use App\User;


class CompanyController extends Controller
{

    public function index()
    {
        $userName = Auth::user()->name;

        $companies = Company::all();

        return view('company.index', ['userName' => $userName, 'companies' => $companies]);
    }

    public function create()
    {
        $userName = Auth::user()->name;
        $users = User::all();

        return view('company.create', ['userName' => $userName, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $userName = Auth::user()->name;

        $this->validate($request, [
                'name'          => 'required',
                'description'   => 'required',
                'phone'         => 'required',
                'email'         => 'required'
            ]);

        $input = $request->all();

        $company = new Company;
        $company->name = $input['name'];
        $company->description = $input['description'];
        $company->phone = $input['phone'];
        $company->user_id = $input['user'];
        $company->save();

        return redirect('company/');
    }

    public function edit($id)
    {
        $userName = Auth::user()->name;
        $users = User::all();
        $company = Company::find($id);

        return view('company.edit', ['userName' => $userName, 'users' => $users, 'company' => $company]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        $input = $request->all();

        $company->name = $input['name'];
        $company->description = $input['description'];
        $company->phone = $input['phone'];
        $company->user_id = $input['user'];
        $company->save();

        return redirect('company/');
    }

    public function destroy($id)
    {
        $company = Company::find($id);

        $company->delete();

        return redirect('company/');
    }

    public function show($id)
    {
        return $this->index();
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
