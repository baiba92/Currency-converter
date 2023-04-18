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
        $result = $this->apiClient->getData();

        foreach ($result->Currencies[0] as $value) {
            if ($value->ID == $currency) {
                return $amount * $value->Rate;
            }
        }
    }
}