<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Setting;
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

        $last5Lines = Data::orderByDesc('id')->limit(25)->get();

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
                'hum' => ['required'],
                'temp' => ['required'],
                'pol' => ['required'],
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

        $setting = Setting::findOrFail(1);

        $data = Data::create([
            "humidite" => $setting->humidite ? $request->hum : null,
            "temperature" => $setting->temperature ? $request->temp : null,
            "pollution" => $setting->pollution ? $request->pol : null,
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

    public function humidite() {

        $setting = Setting::findOrFail(1);
        $setting->humidite = ! $setting->humidite;
        $setting->save();

        return redirect()->back();

    }

    public function temperature() {

        $setting = Setting::findOrFail(1);
        $setting->temperature = ! $setting->temperature;
        $setting->save();

        return redirect()->back();

    }

    public function pollution() {

        $setting = Setting::findOrFail(1);
        $setting->pollution = ! $setting->pollution;
        $setting->save();

        return redirect()->back();

    }

}
