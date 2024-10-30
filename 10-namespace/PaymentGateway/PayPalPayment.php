<?php

namespace PaymentGateway;

// Implementing the PayPalPayment class
class PayPalPayment implements PaymentInterface
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function processPayment($amount)
    {
        return "Processing PayPal payment of $amount for {$this->email}.";
    }
}
