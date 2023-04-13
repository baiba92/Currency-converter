<?php

include 'BankAccount.php';

$ben = new BankAccount('Benson', -17.50);
echo $ben->showUserNameAndBalance();