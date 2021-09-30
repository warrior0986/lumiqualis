<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;

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
    }

    public function getGiphyResult($query)
    {
        $giphyService = new GiphyService();
        $giphyResult = $giphyService->search($query);
        return $giphyResult;
    }
}
