<?php declare(strict_types=1);

namespace BusinessRegisterApp;

use GuzzleHttp\Client;

class ApiClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getRecords(string $parameter): array
    {
        $url = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=$parameter&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9";
        $response = $this->client->get($url);
        $companyData = json_decode($response->getBody()->getContents());

        $foundedRecords = [];
        foreach ($companyData->result->records as $record) {
            if ($record->regcode == $parameter || strpos(strtolower($record->name), strtolower($parameter)))
                $foundedRecords[] = new BusinessData(
                    $record->name,
                    $record->regcode,
                    $record->address,
                    $record->registered
                );
        }
        return $foundedRecords;
    }
}
