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
        $this->uri = $this->url . "?api_key=" . $this->api_key . "&q=";
    }

    public function search($query)
    {
        $response = Http::get($this->uri . "'" . $query . "'&limit=1");
        $results = json_decode($response->body());
        return $results->data[0]->url ?? '';

    }
}