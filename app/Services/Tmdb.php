<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
 
class TmdbService
{

    protected $url;
    protected $api_key;
    protected $uri;

    public function __construct()
    {
        $this->url = config('services.tmdb.url');
        $this->api_key = config('services.tmdb.parameters.api_key');
        $uriParams = http_build_query(config('services.tmdb.parameters'));
        $this->uri = $this->url . "?" . $uriParams . "&query=";
    }

    public function search($query)
    {
        $response = Http::get($this->uri . "'" . $query . "'");
        $results = json_decode($response->body());
        return $results->results[0] ?? '';

    }
}