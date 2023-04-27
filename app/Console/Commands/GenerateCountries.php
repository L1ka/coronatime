<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Statistic;

class GenerateCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coronatime:generate-countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate country data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data =collect(json_decode(Http::get('https://devtest.ge/countries'))) ;

        $data->map(function($country, $id){
            $byCountry = json_decode(Http::post('https://devtest.ge/get-country-statistics', [
                "code" => $country->code,
            ]));

            return Statistic::updateOrCreate(
            ['id' => $id + 1 ],
            [
                'name' => ['en' => $country->name->en, 'ka' => $country->name->ka],
                'new_case' =>  $byCountry->confirmed,
                'recover' =>  $byCountry->recovered,
                'death' =>  $byCountry->deaths]);
         });



        $this->info('Countries generated successfully');
    }
}
