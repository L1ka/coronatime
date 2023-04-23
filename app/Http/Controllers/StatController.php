<?php

namespace App\Http\Controllers;


use App\Models\Stat;
use Illuminate\Contracts\View\View;

class StatController extends Controller
{

    public function countries(): View
    {
        if (request('search')) {
            $data = Stat::where('name', 'like', '%' . ucfirst(request('search')) . '%')->get();
        } else {
            $data = Stat::all();
        }

        $recoverSum = Stat::all()->pluck('recover')->sum();
        $deathSum = Stat::all()->pluck('death')->sum();
        $confirmedSum = Stat::all()->pluck('new_case')->sum();

        return view('dashboard-country', ['data' => $data, 'recover' => $recoverSum, 'death' => $deathSum, 'new_case' => $confirmedSum]);
    }


    public function sort(): View
    {

        if(request('sort') == 'asc' ) $data = Stat::all()->sortBy(request('name'), SORT_REGULAR, true);

        if(request('sort') == 'desc' ) $data = Stat::all()->sortBy(request('name'), SORT_REGULAR, false);



        $recoverSum = Stat::all()->pluck('recover')->sum();
        $deathSum = Stat::all()->pluck('death')->sum();
        $confirmedSum = Stat::all()->pluck('new_case')->sum();
        return view('dashboard-country', ['data' => $data,  'recover' => $recoverSum, 'death' => $deathSum, 'new_case' => $confirmedSum]);
    }

    public function worldwide(): View
    {

        $recoverSum = Stat::all()->pluck('recover')->sum();
        $deathSum = Stat::all()->pluck('death')->sum();
        $confirmedSum = Stat::all()->pluck('new_case')->sum();

        return view('dashboard-worldwide', [ 'recover' => $recoverSum, 'death' => $deathSum, 'new_case' => $confirmedSum]);
    }


}
