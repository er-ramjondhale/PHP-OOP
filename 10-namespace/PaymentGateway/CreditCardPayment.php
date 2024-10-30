<?php

namespace PaymentGateway;

// Implementing the CreditCardPayment class
class CreditCardPayment implements PaymentInterface
{
    private $cardNumber;
    private $cardHolder;

    public function __construct($cardNumber, $cardHolder)
    {
        $this->cardNumber = $cardNumber;
        $this->cardHolder = $cardHolder;
    }

    public function processPayment($amount)
    {
        return "Processing credit card payment of $amount for {$this->cardHolder}.";
    }
}
