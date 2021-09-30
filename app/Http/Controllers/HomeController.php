<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;
use App\Services\TmdbService;

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
}
