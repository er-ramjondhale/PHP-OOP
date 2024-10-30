<?php

// Define the PaymentInterface
interface PaymentInterface
{
    public function processPayment($amount);
    public function getPaymentDetails();
}

// Implementing the CreditCardPayment class
class CreditCardPayment implements PaymentInterface
{
    private $cardNumber;
    private $cardHolder;
    private $expiryDate;

    // Constructor to set credit card details
    public function __construct($cardNumber, $cardHolder, $expiryDate)
    {
        $this->cardNumber = $cardNumber;
        $this->cardHolder = $cardHolder;
        $this->expiryDate = $expiryDate;
    }

    // Implementing the processPayment method
    public function processPayment($amount)
    {
        return "Processing credit card payment of $amount for {$this->cardHolder}.";
    }

    // Implementing the getPaymentDetails method
    public function getPaymentDetails()
    {
        return "Payment Method: Credit Card, Card Holder: {$this->cardHolder}, Expiry Date: {$this->expiryDate}.";
    }
}

// Implementing the PayPalPayment class
class PayPalPayment implements PaymentInterface
{
    private $email;

    // Constructor to set PayPal email
    public function __construct($email)
    {
        $this->email = $email;
    }

    // Implementing the processPayment method
    public function processPayment($amount)
    {
        return "Processing PayPal payment of $amount for {$this->email}.";
    }

    // Implementing the getPaymentDetails method
    public function getPaymentDetails()
    {
        return "Payment Method: PayPal, Email: {$this->email}.";
    }
}

// Function to process payments
function handlePayment(PaymentInterface $paymentMethod, $amount)
{
    echo $paymentMethod->processPayment($amount) . "\n";
    echo $paymentMethod->getPaymentDetails() . "\n";
}

// Create payment objects
$creditCard = new CreditCardPayment("1234-5678-9012-3456", "John Doe", "12/25");
$paypal = new PayPalPayment("john@example.com");

// Process payments
echo '<pre>';
echo "Credit Card Payment:\n";
handlePayment($creditCard, 150.00); // Outputs details for credit card payment
echo "<br>";

echo "PayPal Payment:\n";
handlePayment($paypal, 75.00); // Outputs details for PayPal payment
