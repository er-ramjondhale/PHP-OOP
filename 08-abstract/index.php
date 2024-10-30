<pre>
<?php

// Define the abstract class Payment
abstract class Payment
{
    protected $amount;

    // Constructor to set the payment amount
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    // Abstract method to process payment (must be implemented by derived classes)
    abstract public function processPayment();

    // Method to get payment details
    public function getPaymentAmount()
    {
        return $this->amount;
    }
}

// Implementing the CreditCardPayment class
class CreditCardPayment extends Payment
{
    private $cardNumber;
    private $cardHolder;
    private $expiryDate;

    // Constructor to set credit card details
    public function __construct($amount, $cardNumber, $cardHolder, $expiryDate)
    {
        parent::__construct($amount); // Call the parent constructor
        $this->cardNumber = $cardNumber;
        $this->cardHolder = $cardHolder;
        $this->expiryDate = $expiryDate;
    }

    // Implementing the processPayment method
    public function processPayment()
    {
        return "Processing credit card payment of {$this->amount} for {$this->cardHolder}.";
    }
}

// Implementing the PayPalPayment class
class PayPalPayment extends Payment
{
    private $email;

    // Constructor to set PayPal email
    public function __construct($amount, $email)
    {
        parent::__construct($amount); // Call the parent constructor
        $this->email = $email;
    }

    // Implementing the processPayment method
    public function processPayment()
    {
        return "Processing PayPal payment of {$this->amount} for {$this->email}.";
    }
}

// Function to handle payments
function handlePayment(Payment $paymentMethod)
{
    echo $paymentMethod->processPayment() . "\n";
    echo "Payment Amount: " . $paymentMethod->getPaymentAmount() . "\n";
}

// Create payment objects
$creditCard = new CreditCardPayment(150.00, "1234-5678-9012-3456", "John Doe", "12/25");
$paypal = new PayPalPayment(75.00, "john@example.com");

// Process payments
echo "Credit Card Payment:\n";
handlePayment($creditCard); // Outputs details for credit card payment
echo "<br>";

echo "PayPal Payment:\n";
handlePayment($paypal); // Outputs details for PayPal payment
