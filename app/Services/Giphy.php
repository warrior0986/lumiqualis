<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
 
class GiphyService
{

    protected $url;
    protected $api_key;
    protected $uri;

    public function __construct()
    {
        $this->url = config('services.giphy.url');
        $this->api_key = config('services.giphy.parameters.api_key');
        $uriParams = http_build_query(config('services.giphy.parameters'));
        $this->uri = $this->url . "?" . $uriParams . "&q=";
    }

    public function search($query)
    {
        $response = Http::get($this->uri . "'" . $query . "'");
        $results = json_decode($response->body());
        return $results->data[0]->url ?? '';

    }
}