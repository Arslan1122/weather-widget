<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    /*
     * @param $request
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLocationWeather($request)
    {
        $client = new Client();

        $params = "units=metric&lat=$request->lat&lon=$request->lon&exclude=$request->exclude&appid=$request->appid";

        $api = config('services.openweather.api')."data/2.5/onecall?$params";

        $response =  $client->get($api);

        return $response->getBody()->getContents();
    }
}
