<?php

include 'SavingsAccount.php';

class TestSavingsAccount
{
    public function main()
    {
        $balance = readline('How much money is in the account? ');
        $annualRate = readline('Enter the annual interest rate: ');
        $months = readline('How long has the account been opened? ');
        $account = new SavingsAccount($balance);
        $account->setInterestRates($annualRate);

        for ($i = 0; $i < $months; $i++) {
            $monthNumber = $i + 1;
            $deposit = readline("Enter amount deposited for month $monthNumber: ");
            $account->deposit($deposit);
            $withdrawal = readline("Enter amount withdrawn for month $monthNumber: ");
            $account->withdrawal($withdrawal);
            $account->calculateMonthlyInterest();
        }

        echo 'Total deposited: $' . number_format($account->getTotalDeposit(), 2) . PHP_EOL;
        echo 'Total withdrawn: $' . number_format($account->getTotalWithdrawal(), 2) . PHP_EOL;
        echo 'Interest earned: $' . number_format($account->getInterestEarned(), 2) . PHP_EOL;
        echo 'Ending balance: $' . number_format($account->getBalance(), 2) . PHP_EOL;
    }
}

$test = new TestSavingsAccount();
$test->main();