<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use SimpleXMLElement;

class ApiClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function getRates(): SimpleXMLElement
    {
        $url = "https://www.latvijasbanka.lv/vk/ecb.xml";
        $request = $this->client->get($url);
        return simplexml_load_string($request->getBody()->getContents());
    }
}