<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Campain;
use DB;

class DashboardController extends BaseController
{
    public function index()
    {
        $userName = Auth::user()->name;

        $campains = Campain::all();

        $positiveROI = 0;
        $negativeROI = 0;

        foreach ($campains as $campain)
        {
            $cost = $campain->cost;
            $gain = $campain->gain;

            $roi = ($gain - $cost) / $cost;

            if ($roi > 0)
            {
                $positiveROI++;
            }
            else
            {
                $negativeROI++;
            }
        }

        $campainsA = $campains->toArray();
        $campainsA = array_reverse($campainsA);
        $max = 5;
        if (count($campainsA) < 5) {
            $max = count($campainsA);
        }

        $indexValues = [
                [0, 0],
                [0, 0],
                [0, 0],
                [0, 0],
                [0, 0]
        ];

        for ($i=0; $i < $max ; $i++) {
            $cost = $campainsA[$i]["cost"];
            $gain = $campainsA[$i]["gain"];

            $indexValues[$i][0] = $cost;
            $indexValues[$i][1] = $gain;
        }

        return view('dashboard', [
            'userName' => $userName,
            'positiveROI' => $positiveROI,
            'negativeROI' => $negativeROI,
            'lastFive' => $indexValues
        ]);
    }
}
