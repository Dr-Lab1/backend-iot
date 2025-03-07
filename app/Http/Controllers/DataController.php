<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'humidite' => ['required'],
                'temperature' => ['required'],
                'pollution' => ['required'],
                'lumiere' => ['required'],
            ]
        );

        if (!$validator->passes()) {
            return response(
                [
                    "success" => 0,
                    "errors" => $validator->errors()->all()
                ],
                403
            );
        }
        $data = Data::create([
            "humidite" => $request->hum,
            "temperature" => $request->temp,
            "pollution" => $request->pol,
            "lumiere" => $request->lum,
        ]);


        return response(
            [
                "success" => 1,
                "errors" => null,
                "array" => [
                    'data' => $data,
                ]
            ],
            200
        );
    }
}
