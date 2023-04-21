<?php declare(strict_types=1);

use App\CurrencyConverter;

require_once 'vendor/autoload.php';

$amount = (float)readline('Enter amount: ');
$currency = readline('Enter currency to convert: ');

$converter = new CurrencyConverter();

if (!$converter->convertCurrency($amount, $currency)) {
    echo "Currency not found" . PHP_EOL;
    exit;
}

$formattedAmount = number_format($converter->convertCurrency($amount, $currency), 2);
echo "EUR $amount -> $currency $formattedAmount";