<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MonkeyLearn;
use Auth;
use App\Campain;
use App\Company;
use App\Keyword;
use App\Link;

class CampainController extends Controller
{
    public function index()
    {
        $userName = Auth::user()->name;

        $campains = Campain::all();

        return view('campain.index', ['userName' => $userName, 'campains' => $campains]);
    }

    public function create()
    {
        $userName = Auth::user()->name;
        $companies = Company::all();

        return view('campain.create', ['userName' => $userName, 'companies' => $companies]);
    }

    public function edit($id)
    {
        $userName = Auth::user()->name;
        $companies = Company::all();

        $campain = Campain::find($id);


        return view('campain.edit', ['userName' => $userName, 'companies' => $companies, 'campain' => $campain]);
    }

    public function store(Request $request)
    {
        $userName = Auth::user()->name;

        $this->validate($request, [
                'start_at'      => 'required',
                'end_at'        => 'required',
                'description'   => 'required',
                'target'        => 'required',
                'advert'        => 'required'
            ]);

        $input = $request->all();

        $campain = new Campain;
        $campain->start_at = $input['start_at'];
        $campain->end_at = $input['end_at'];
        $campain->description = $input['description'];
        $campain->cost = $input['cost'];
        $campain->gain = $input['gain'];
        $campain->target = $input['target'];
        $campain->advert = $input['advert'];
        $campain->company_id = $input['company_id'];
        $campain->save();

        return redirect('campain/');
    }

    public function update(Request $request, $id)
    {
        $campain = Campain::find($id);

        $input = $request->all();

        $campain->start_at = $input['start_at'];
        $campain->end_at = $input['end_at'];
        $campain->description = $input['description'];
        $campain->cost = $input['cost'];
        $campain->gain = $input['gain'];
        $campain->target = $input['target'];
        $campain->advert = $input['advert'];
        $campain->company_id = $input['company_id'];
        $campain->save();

        return redirect('campain/');
    }

    public function destroy($id)
    {
        $campain = Campain::find($id);

        $campain->delete();

        return redirect('campain/');
    }

    public function processAdvert($campain_id)
    {
        $userName = Auth::user()->name;

        $campain = Campain::find($campain_id);
        $advert = $campain->advert;

        $response = "";

        try {

            $ml = new MonkeyLearn\Client('74312b126c6fcee32bddc68b6b3d4b15fee48868');
            $text_list = [$advert];
            $module_id = 'ex_eV2dppYE';
            $res = $ml->extractors->extract($module_id, $text_list);

            $results = $res->result;
            $response = $results[0];

        }catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }

        $colors = ['bg-success', 'bg-primary', 'bg-danger', 'bg-warning'];
        $keywords = [];
        foreach ($response as $item) {
            $text = $item["keyword"];
            $relevance = $item["relevance"];
            $isRegistered = 'Existente';
            $color = $colors[array_rand($colors)];

            $relevance = ($relevance * 100) . "%";

            $keyword = Keyword::where('text', '=', $text)->count();

            if ($keyword == 0) {
                $isRegistered = 'Nuevo Registro';
                $keyword = new Keyword;
                $keyword->text = $text;
                $keyword->save();

                $link = new Link;
                $link->campain_id = $campain_id;
                $link->keyword_id = $keyword->id;
                $link->save();
            }

            $keywords[] = [
                "text" => $text,
                "relevance" => $relevance,
                "isRegistered" => $isRegistered,
                "color" => $color
            ];
        }

        return view('campain.result', ['userName' => $userName, 'textArticle' => $advert, 'keywords' => $keywords]);
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
