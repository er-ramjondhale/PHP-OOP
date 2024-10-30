<?php

class BankAccount
{
    // Private property to store balance
    private $balance;

    // Constructor to initialize balance
    public function __construct($initialBalance)
    {
        if ($initialBalance < 0) {
            echo "Initial balance cannot be negative.\n";
            $this->balance = 0;
        } else {
            $this->balance = $initialBalance;
        }
    }

    // Public method to deposit money
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited: $amount. New balance: {$this->balance}.\n";
        } else {
            echo "Deposit amount must be positive.\n";
        }
    }

    // Public method to withdraw money
    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrew: $amount. New balance: {$this->balance}.\n";
        } else {
            echo "Invalid withdrawal amount.\n";
        }
    }

    // Public method to get the balance
    public function getBalance()
    {
        return $this->balance;
    }
}

// Create a bank account object
$account = new BankAccount(1000);

// Demonstrate encapsulation
$account->deposit(500);   // Outputs: Deposited: 500. New balance: 1500.
$account->withdraw(200);  // Outputs: Withdrew: 200. New balance: 1300.

// Trying to access balance directly will cause an error
// echo $account->balance; // This will give an error because $balance is private

// Access the balance using the public method
echo "Current balance: " . $account->getBalance() . "\n"; // Outputs: Current balance: 1300.
