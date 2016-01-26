<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Campain;

class CampainController extends BaseController
{
    public function index()
    {
        $userName = Auth::user()->name;

        $campains = Campain::all();

        return view('campain.index', ['userName' => $userName, 'campains' => $campains]);
    }

    public function optAdd()
    {
        // $campain = new Campain;
        //
        // $campain->start_at = '2016/01/01';
        // $campain->end_at = '2016/01/20';
        // $campain->description = 'Description 2';
        // $campain->cost = 140;
        // $campain->gain = 310;
        // $campain->target = "19;male;UIO;20-45";
        // $campain->company_id = 1;
        //
        // $campain->save();

        $campain = Campain::find(2);

        print_r($campain->company->name);
        die();
    }
}
