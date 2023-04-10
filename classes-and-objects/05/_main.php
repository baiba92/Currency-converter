<?php

include 'Date.php';

class DateTest
{
    public function main()
    {
        $date = new Date('12', '08', '2023');
        echo $date->displayDate() . PHP_EOL;

        echo $date->getDay() . PHP_EOL;
        $date->setDay('31');

        echo $date->getMonth() . PHP_EOL;
        $date->setMonth('12');

        echo $date->getYear() . PHP_EOL;
        $date->setYear('2030');

        echo $date->displayDate() . PHP_EOL;
    }
}

$test = new DateTest();
$test->main();