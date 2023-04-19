<?php declare(strict_types=1);

use App\CurrencyConverter;

require_once 'vendor/autoload.php';

$amount = (float)readline('Enter amount: ');
$currency = readline('Enter currency to convert: ');

$converter = new CurrencyConverter();

echo "EUR $amount -> $currency {$converter->convertCurrency($amount, $currency)}";