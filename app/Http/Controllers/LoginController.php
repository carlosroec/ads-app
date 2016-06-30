<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Company;
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

        // $emailCount = User::where('email', '=', $input['email'])->count();
        // $nameCount = User::where('name', '=', $input['name'])->count();
        //
        // if ($emailCount > 0)
        // {
        //     return view('users.create', ['userName' => $userName, 'users' => $users]);
        // }
        // if ($nameCount > 0)
        // {
        //
        // }
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

        $input = $request->all();

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();

        return redirect('login/');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('login/');
    }

    public function show($id)
    {
        return $this->index();
    }

}
