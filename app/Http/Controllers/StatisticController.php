<?php

namespace App\Http\Controllers;


use App\Models\Statistic;
use Illuminate\Contracts\View\View;


class StatisticController extends Controller
{

    public function countries(): View
    {
        if (request('search')) {
           $data =  Statistic::where('name->en', 'like', '%' . ucfirst(request('search')) . '%')->
           orWhere('name->ka', 'like', '%' . request('search') . '%')->get();
         }
        elseif(request('sort')){
          return $this->sort();
        }
        else{
            $data = Statistic::all();
        }

        return view('dashboard-country', ['data' => $data, 'sum' => $this->countrySum()]);
    }


    public function sort(): View
    {

        if(request('sort') == 'asc' ) $data = Statistic::all()->sortBy(request('name'), SORT_REGULAR, true);

        if(request('sort') == 'desc' ) $data = Statistic::all()->sortBy(request('name'), SORT_REGULAR, false);


        return view('dashboard-country', ['data' => $data,  'sum' => $this->countrySum()]);
    }

    public function worldwide(): View
    {
        return view('dashboard-worldwide', [ 'sum' => $this->countrySum() ]);
    }

    public function countrySum()
    {
        $countrySum = [
			'recover' => Statistic::sum('recover'),
			'death'    => Statistic::sum('death'),
			'new_case' =>  Statistic::sum('new_case'),
		];
        return  $countrySum;

    }


}
