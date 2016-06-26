<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Campain;

class ReportController extends BaseController
{
    public function index()
    {
        $userName = Auth::user()->name;

        return view('dashboard', ['userName' => $userName]);
    }

    public function campains()
    {
        $userName = Auth::user()->name;
        $campains = Campain::all();

        return view('report.campains', ['userName' => $userName, 'campains' => $campains]);
    }
}
