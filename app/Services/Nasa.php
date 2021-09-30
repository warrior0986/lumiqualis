<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
 
class NasaService
{

    protected $url;
    protected $api_key;
    protected $uri;

    public function __construct()
    {
        $this->url = config('services.nasa.url');
        $this->api_key = config('services.nasa.parameters.api_key');
        $uriParams = http_build_query(config('services.nasa.parameters'));
        $this->uri = $this->url . "?" . $uriParams;
    }

    public function search()
    {
        $response = Http::get($this->uri);
        $results = json_decode($response->body());
        dd($results);
        return $results->results[0] ?? '';

    }
}