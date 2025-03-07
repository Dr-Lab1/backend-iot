<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function getData()
    {
        $data = Data::orderBy('timestamp')->get();

        $avgHumidite = Data::average('humidite');
        $avgTemperature = Data::average('temperature');
        $avgPollution = Data::average('pollution');
        $avgLumiere = Data::average('lumiere');

        $last5Lines = Data::orderBy('timestamp', 'desc')->limit(10)->get();

        return response(
            [
                "success" => 1,
                "errors" => null,
                "array" => [
                    'avgTemperature' => $avgTemperature,
                    'avgPollution' => $avgPollution,
                    'avgLumiere' => $avgLumiere,
                    'avgHumidite' => $avgHumidite,
                    'last5Lines' => $last5Lines,
                    'dataLength' => count($data),
                    'data' => $data,
                ]
            ],
            200
        );
    }
}
