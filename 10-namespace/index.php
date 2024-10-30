<?php

require_once __DIR__ . '/PaymentGateway/PaymentInterface.php';
require_once __DIR__ . '/PaymentGateway/CreditCardPayment.php';
require_once __DIR__ . '/PaymentGateway/PayPalPayment.php';
require_once __DIR__ . '/PaymentReporting/Report.php';

use PaymentGateway\CreditCardPayment;
use PaymentGateway\PayPalPayment;
use PaymentReporting\Report;

// Creating payment objects
$creditCard = new CreditCardPayment("1234-5678-9012-3456", "John Doe");
$paypal = new PayPalPayment("john@example.com");

echo '<pre>';
// Processing payments
echo $creditCard->processPayment(150.00) . "<br>"; // Outputs: Processing credit card payment of 150 for John Doe.
echo $paypal->processPayment(75.00) . "<br>"; // Outputs: Processing PayPal payment of 75 for john@example.com.

// Using the PaymentReporting namespace
$report = new Report();
echo $report->generateReport("Credit Card Payment of 150.00") . "<br>"; // Outputs: Generating report for payment: Credit Card Payment of 150.00.
