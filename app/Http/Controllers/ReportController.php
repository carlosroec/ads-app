<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Campain;
use App\Company;
use DB;

class ReportController extends BaseController
{
    public function index()
    {
        $userName = Auth::user()->name;

        return view('dashboard', ['userName' => $userName]);
    }

    public function companies()
    {
        $userName = Auth::user()->name;
        $companies = Company::all();
        $results = [];

        foreach ($companies as $company)
        {
            $company_id = $company->id;

            $campains = DB::table('campains')->where('company_id', '=', $company_id)->get();

            $totalGain = 0;
            $totalInvestment = 1;
            foreach ($campains as $campain) {
                $totalGain = $totalGain + $campain->gain;
                $totalInvestment = $totalInvestment + $campain->cost;

            }

            $roi = ($totalGain - $totalInvestment) / $totalInvestment;

            if ($roi < 0)
            {
                $roi = 0;
            }

            $roi = number_format($roi, 2);

            $results[] = [
                    "name" => $company->name,
                    "roi" => $roi
            ];
        }


        return view('report.companies', ['userName' => $userName, 'results' => $results]);
    }

    public function campains()
    {
        $userName = Auth::user()->name;
        $campains = Campain::all();

        return view('report.campains', ['userName' => $userName, 'campains' => $campains]);
    }
}
