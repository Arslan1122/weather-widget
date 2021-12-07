<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeatherWidgetController extends Controller
{
    use ApiResponder;

    /**
     * @var WeatherService
     */
    private $weatherService;

    /**
     * @param WeatherService $weatherService
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }


    public function index(Request $request)
    {

        return view('welcome');

    }

    public function weatherByLocation(Request $request)
    {
        try {

            $weather = $this->weatherService->getLocationWeather($request);

            return $this->success("Weather Details", $weather);

        } catch (\Exception $exception) {

            return $this->failure($exception->getMessage());
        }
    }

}
