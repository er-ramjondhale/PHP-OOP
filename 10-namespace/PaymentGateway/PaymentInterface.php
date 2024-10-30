<?php

namespace PaymentGateway;

// Payment interface defining the method to process payment
interface PaymentInterface
{
    public function processPayment($amount);
}
