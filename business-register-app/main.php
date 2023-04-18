<?php declare(strict_types=1);

use BusinessRegisterApp\ApiClient;
use BusinessRegisterApp\BusinessData;

require_once 'vendor/autoload.php';

$parameter = readline('Enter name or registration number to search company: ');

$apiClient = new ApiClient();
$records = $apiClient->getRecords($parameter);

echo PHP_EOL;

if (!$records) {
    echo 'Results not found.';
}

/** @var BusinessData $record */
foreach ($records as $record) {
    echo "Company name: {$record->getName()}" . PHP_EOL;
    echo "Registration number: {$record->getRegNumber()}" . PHP_EOL;
    echo "Address: {$record->getAddress()}" . PHP_EOL;
    $date = substr($record->getRegDate(), 0, 10);
    echo "Registration date: $date" . PHP_EOL;
    echo PHP_EOL;
}