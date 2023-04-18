<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;

class ApiClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function getData(): \SimpleXMLElement
    {
        $url = "https://www.latvijasbanka.lv/vk/ecb.xml";
        $request = $this->client->request('GET', $url);
        return simplexml_load_string($request->getBody()->getContents());
    }
}