<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Auth;

class CampainController extends BaseController
{
    public function index()
    {
        $userName = Auth::user()->name;

        return view('dashboard', ['userName' => $userName]);
    }
}
