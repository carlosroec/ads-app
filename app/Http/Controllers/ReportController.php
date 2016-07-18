<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Campain;
use App\Company;
use App\Keyword;
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

    public function keywords()
    {
        $userName = Auth::user()->name;
        $keywords = Keyword::all();

        $results = [];

        foreach ($keywords as $keyword)
        {
            $id = $keyword->id;

            $lists = DB::table('links')->where('keyword_id', '=', $id)->get();
            $listCount = count($lists);

            $results[] =  [
                    "keyword" => $keyword->text,
                    "count" => $listCount
            ];
        }


        usort($results, function ($a, $b) {
            return $b['count'] - $a['count'];
        });

        return view('report.keywords', ['userName' => $userName, 'results' => $results]);
    }

    public function global1()
    {
        $userName = Auth::user()->name;
        $campains = Campain::all();

        $investmentTotal = 0;
        $gainTotal = 0;
        $totalDays = 0;
        $totalCampains = count($campains);

        foreach ($campains as $campain)
        {
            $investmentTotal = $investmentTotal + $campain->cost;
            $gainTotal = $gainTotal + $campain->gain;

            $datetime1 = date_create($campain->start_at);
            $datetime2 = date_create($campain->end_at);
            $interval = $datetime1->diff($datetime2);
            $totalDays = $totalDays + $interval->format('%a');
        }

        $investmentAverage = number_format(($investmentTotal / $totalCampains), 2);
        $investmentGain = number_format(($gainTotal / $totalCampains), 2);
        $daysAverage = number_format(($totalDays / $totalCampains), 2);

        return view('report.global', ['userName' => $userName, 'total' => $totalCampains, 'campainAverage' => $daysAverage, 'investmentAverage' => $investmentAverage, 'gainAverage' => $investmentGain]);
    }

    public function roi()
    {
        $userName = Auth::user()->name;

        $campains = Campain::all();

        $resp = array();

        foreach ($campains as $campain)
        {
            $id = $campain->id;
            $cost = $campain->cost;
            $gain = $campain->gain;

            $roi = ($gain - $cost) / $cost;

            $resp[$id] = $roi;
        }
        arsort($resp);

        $report = [];

        foreach ($resp as $key => $value)
        {


            $lists = DB::table('links')->where('campain_id', '=', $key)->get();

            $keywords = [];
            foreach ($lists as $list)
            {
                $keyword_id = $list->keyword_id;

                $keyword = Keyword::find($keyword_id);

                $keywords[] = $keyword->text;
            }

            $report[] = ["campain" => $campain->description, "roi" => $value, "keywords" => $keywords];
        }

        return view('report.roi', ['userName' => $userName, 'reports' => $report]);
    }
}
