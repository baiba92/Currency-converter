<?php declare(strict_types=1);

namespace App;

class CurrencyConverter
{
    private ApiClient $apiClient;

    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    public function convertCurrency(float $amount, string $currency): float
    {
        $records = $this->apiClient->getRates();

        $result = 0;
        foreach ($records->Currencies->Currency as $record) {
            if ($record->ID == $currency) {
                $result = $amount * $record->Rate;
            }
        }
        return $result;
    }
}