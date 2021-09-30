<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;
use App\Services\TmdbService;
use App\Services\NasaService;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $query)
    {
        $giphyResult = $this->getGiphyResult($query);
        $tmdbResult = $this->getTmdbResult($query);
        $nasaResult = $this->getNasaResult();
        $response = $this->prepareResponse($giphyResult, $tmdbResult, $nasaResult);
        return response()->json($response);
    }

    public function getGiphyResult($query)
    {
        $giphyService = new GiphyService();
        $giphyResult = $giphyService->search($query);
        return $giphyResult;
    }

    public function getTmdbResult($query)
    {
        $tmdbService = new TmdbService();
        $tmdbResult = $tmdbService->search($query);
        return $tmdbResult;
    }

    public function getNasaResult()
    {
        $nasa = new NasaService();
        $nasaResult = $nasa->search();
        return $nasaResult;
    }

    public function prepareResponse($giphyResult, $tmdbResult, $nasaResult)
    {
        $response = config('response-structure');
        $response["copyright"] = $nasaResult->copyright;
        $response["date"] = $nasaResult->date;
        $response["explanation"] = $nasaResult->explanation;
        $response["media_type"] = $nasaResult->media_type;
        $response["service_version"] = $nasaResult->service_version;
        $response["nasa_image_title"] = $nasaResult->title;
        $response["nasa_image_url"] = $nasaResult->url;

        $response["imdb"] = $tmdbResult; //the json structure in mail says imdb, but i think is tmdb
        $response["giphy"]["image"] = $giphyResult;
        return $response;
    }
}
