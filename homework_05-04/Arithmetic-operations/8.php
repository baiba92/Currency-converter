<?php

/*
 * Foo Corporation needs a program to calculate how much to pay their hourly employees.
 * The US Department of Labor requires that employees get paid time and a half for any hours over 40 that they work
 * in a single week. For example, if an employee works 45 hours, they get 5 hours of overtime,
 * at 1.5 times their base pay. The State of Massachusetts requires that hourly employees be paid
 * at least $8.00 an hour. Foo Corp requires that an employee not work more than 60 hours in a week.
 *
 *
An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
For every hour over 40, they get overtime = (base pay) × 1.5.
The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
If the number of hours is greater than 60, print an error message.
Write a method that takes the base pay and hours worked as parameters, and prints the total pay or an error.
Write a main method that calls this method for each of these employees:

Employee	Base Pay	Hours Worked
Employee 1	$7.50	35
Employee 2	$8.20	47
Employee 3	$10.00	73
 */

$minWagePerHour = 8;
$overtimePay = 1.5;
$maxBasePayHours = 40;
$maxWorkingHours = 60;

function getTotalPay(float $basePay, int $hoursWorked): string
{
    global $minWagePerHour, $overtimePay, $maxBasePayHours, $maxWorkingHours;
    if ($basePay < $minWagePerHour) {
        return "Error, base pay has to be at least $minWagePerHour $.";
    } elseif ($hoursWorked > $maxWorkingHours) {
        return "Error, maximum working hours limit is $maxWorkingHours.";
    } elseif ($hoursWorked > $maxBasePayHours) {
        return (($hoursWorked - $maxBasePayHours) * $basePay * $overtimePay)
            + $maxBasePayHours * $basePay . " $/week";
    } else {
        return $hoursWorked * $basePay . " $/week";
    }
}

function newEmployee(float $basePay, int $hoursWorked): stdClass
{
    $employee = new stdClass();
    $employee->basePay = $basePay;
    $employee->hoursWorked = $hoursWorked;
    $employee->weekSalary = getTotalPay($basePay, $hoursWorked);
    return $employee;
}

var_dump(newEmployee(7.5, 35));
var_dump(newEmployee(8.2, 47));
var_dump(newEmployee(10, 73));