<?php

namespace PaymentReporting;

// Report class to generate payment reports
class Report
{
    public function generateReport($paymentDetails)
    {
        return "Generating report for payment: $paymentDetails.";
    }
}
