<?php

include 'Account.php';

class TestAccount
{
    public function main()
    {
        $firstAccount = new Account('First account', 100);
        echo $firstAccount->balance() . PHP_EOL;
        $firstAccount->withdrawal(20) . PHP_EOL;
        echo $firstAccount->balance() . PHP_EOL;

        $mattsAccount = new Account('Matt\'s account', 1000);
        $myAccount = new Account('My account', 0);
        $mattsAccount->withdrawal(100);
        $myAccount->deposit(100);
        echo $mattsAccount->balance() . PHP_EOL;
        echo $myAccount->balance() . PHP_EOL;

        $a = new Account('A', 100);
        $b = new Account('B', 0);
        $c = new Account('C', 0);
        $a->transfer($a, $b, 50);
        $b->transfer($b, $c, 25);
        echo $a->balance() . PHP_EOL;
        echo $b->balance() . PHP_EOL;
        echo $c->balance() . PHP_EOL;
    }
}

$test = new TestAccount();
$test->main();