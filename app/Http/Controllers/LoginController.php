<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Company;
use App\Campain;
use App\Link;
use App\User;


class LoginController extends Controller
{

    public function index()
    {
        $userName = Auth::user()->name;

        $users = User::all();

        return view('users.index', ['userName' => $userName, 'users' => $users]);
    }

    public function create()
    {
        $userName = Auth::user()->name;
        $users = User::all();

        return view('users.create', ['userName' => $userName, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $userName = Auth::user()->name;

        $this->validate($request, [
                'name'              => 'required|unique:users',
                'email'             => 'required|unique:users',
                'password'          => 'required|min:6',
                'password_confirm'  => 'required|same:password'
            ]);

        $input = $request->all();


        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->save();

        return redirect('login/');
    }

    public function edit($id)
    {
        $userName = Auth::user()->name;

        $user = User::find($id);

        return view('users.edit', ['userName' => $userName, 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
                'name'              => 'required',
                'email'             => 'required'
            ]);

        $input = $request->all();

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();

        return redirect('login/');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $companies = Company::where('user_id', '=', $id)->get();

        if (count($companies) > 0)
        {
            foreach ($companies as $company)
            {
                $campains = Campain::where('company_id', '=', $company->id)->get();

                if (count($campains) > 0)
                {
                    foreach ($campains as $campain)
                    {

                        $links = Link::where('campain_id', '=', $campain->id)->get();

                        if (count($links) > 0)
                        {
                            foreach ($links as $link)
                            {
                                $link->delete();
                            }
                        }
                        $campain->delete();
                    }
                }
            }

            $company->delete();
        }

        $user->delete();

        return redirect('login/');
    }

    public function show($id)
    {
        return $this->index();
    }

}
