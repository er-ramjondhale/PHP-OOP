# PHP Object-Oriented Programming (OOP) Guide

OOP is a programming style in which we group methods and variables of a particular topic into single class. For example, the code that relate users will be in User class. OOP is heavily adopted because it support code organization, provides modularity and reduces the need to repeat ourselves.
- **Encapsulation:** data and the operations that manipulate the data (the code) are both encapsulated in the object.
- **Inheritance:** A class can inherit from another class and take advantage of the methods and properties defined by the superclass.
- **Polymorphism:** Similar objects can respond to the same messages (method) in different ways.
- **Composition:** an object is built from other objects. embedding classes in other classes. (has a)

## Table of Contents
- [Class and Object](#class-and-object)
- [Constructor & Destructor](#Constructor-and-destructor)
- [Access Modifiers](#access-modifiers)
- [Inheritance](#inheritance)
- [Encapsulation](#encapsulation)
- [Polymorphism](#polymorphism)
- [Interface](#interface)
- [Abstract Class](#abstract-class)
- [Traits](#traits)
- [Namespace](#namespace)
- [Autoload](#autoload)

## Class and Object

### Class
A **class** is a blueprint for objects, which are instances of a class. Classes group properties and methods related to an entity. Classes are used to group the code that handles a certain topic into one place. It is a template for creating objects, providing initial values for state (properties/attributes) and implementations of behavior (methods).
### Object
A person can be seen as an object defined by two components: attributes (such as eye color, age, height) and behaviors (such as walking, talking, breathing). In its basic definition, an object is an entity that contains both data and behavior. Each person is different in terms of there age and in how they walk or talk. But they all instance of a class that organize their attributes and behavior for example Human class.

```php
<?php
class Car {
    public $make;
    public $model;
    // Define Properties

    public function getCarInfo() {
        // Define Method
        return "Make: $this->make, Model: $this->model";
    }
}

$car = new Car("Toyota", "Camry");
echo $car->getCarInfo(); // Make: Toyota, Model: Camry
?>
```

## Constructor and destructor
A constructor is a special method that automatically executes when an object is created. It is used to initialize object properties. A destructor is a method called when an object is destroyed, useful for cleanup tasks.
```php
<?php
class Car {
    public $make;
    public $model;

    // Constructor
    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    // Destructor
    public function __destruct() {
        echo "The car {$this->make} {$this->model} is being destroyed.";
    }
}

$car = new Car("Toyota", "Camry");
echo $car->getCarInfo(); // Output: Make: Toyota, Model: Camry
// Destructor will be called when $car is no longer needed
?>
```

## Access Modifiers
Access Modifiers define the visibility of properties and methods within a class:
- **public:** Accessible from anywhere.
- **protected:** Accessible within the class and subclasses.
- **private:** Accessible only within the class.
```php
<?php
class User {
    public $name = "John";
    protected $email = "john@example.com";
    private $password = "secret";

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->email;
    }
}

$user = new User();
echo $user->name; // Output: John
echo $user->getEmail(); // Output: john@example.com
// echo $user->getPassword(); // Fatal error: Uncaught Error: Cannot access private method
?>
```

## Inheritance
Inheritance is central concept in OOP, they enable us to reduce code duplications by creating a parent/master class with properties and method that can be inherited by child classes. In php, and many other languages, we use extends keyword to inherit from another class.
```php
<?php
class Animal {
    public function speak() {
        return "Sound";
    }
}

class Dog extends Animal {
    public function speak() {
        return "Bark";
    }
}

$dog = new Dog();
echo $dog->speak(); // Output: Bark
?>
```

## Encapsulation
Encapsulation restricts direct access to object properties, ensuring control through getters and setters.
```php
<?php
class BankAccount {
    // Private property to hold the account balance
    private $balance;

    // Constructor to initialize the balance
    public function __construct($initialBalance) {
        if ($initialBalance < 0) {
            throw new Exception("Initial balance cannot be negative.");
        }
        $this->balance = $initialBalance;
    }

    // Getter for balance
    public function getBalance() {
        return $this->balance;
    }

    // Method to deposit money
    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Deposit amount must be positive.");
        }
        $this->balance += $amount;
    }

    // Method to withdraw money
    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Withdrawal amount must be positive.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds.");
        }
        $this->balance -= $amount;
    }
}
// Usage
try {
    // Create a new BankAccount with an initial balance
    $account = new BankAccount(1000);
    echo "Initial Balance: $" . $account->getBalance() . "\n";
   
   // Deposit money
    $account->deposit(500);
    echo "After Deposit: $" . $account->getBalance() . "\n";
   
   // Withdraw money
    $account->withdraw(300);
    echo "After Withdrawal: $" . $account->getBalance() . "\n";
   
   // Attempting to withdraw more than the balance
    $account->withdraw(1500);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
```

## Polymorphism
Put simply, Polymorphism is a principle that state that methods in different classes doing similar things should have the same name.
```php
<?php
// Base class
abstract class Payment {
    protected $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    // Abstract method to be implemented by subclasses
    abstract public function processPayment();
}

// Subclass for Credit Card Payment
class CreditCardPayment extends Payment {
    private $cardNumber;

    public function __construct($amount, $cardNumber) {
        parent::__construct($amount);
        $this->cardNumber = $cardNumber;
    }

    public function processPayment() {
        return "Processing credit card payment of $" . $this->amount . " using card number: " . $this->cardNumber;
    }
}

// Subclass for PayPal Payment
class PayPalPayment extends Payment {
    private $email;

    public function __construct($amount, $email) {
        parent::__construct($amount);
        $this->email = $email;
    }

    public function processPayment() {
        return "Processing PayPal payment of $" . $this->amount . " using email: " . $this->email;
    }
}

// Function to demonstrate polymorphism in payment processing
function executePayment(Payment $payment) {
    echo $payment->processPayment() . "\n";
}

// Usage
$creditCardPayment = new CreditCardPayment(150, '1234-5678-9012-3456');
$paypalPayment = new PayPalPayment(75, 'user@example.com');

// Executing payments
executePayment($creditCardPayment); // Outputs: Processing credit card payment of $150 using card number: 1234-5678-9012-3456
executePayment($paypalPayment); // Outputs: Processing PayPal payment of $75 using email: user@example.com
?>
```

## Interface
Interfaces define a contract that implementing classes must follow. They can declare methods that must be implemented without defining how they are implemented. An interface can be seen as an outline of what a particular object can do. They are considered one of the main building blocks of the SOLID pattern. With interfaces we can create code which specifies which methods a class must implement, without having to define how these methods are implemented.
```php
<?php
// Define the Shape interface
interface Shape {
    public function area(); // Method to calculate the area
    public function perimeter(); // Method to calculate the perimeter
}

// Implementing the Circle class
class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * ($this->radius ** 2);
    }

    public function perimeter() {
        return 2 * pi() * $this->radius;
    }
}

// Implementing the Rectangle class
class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }

    public function perimeter() {
        return 2 * ($this->width + $this->height);
    }
}

// Function to demonstrate polymorphism with the Shape interface
function printShapeDetails(Shape $shape) {
    echo "Area: " . $shape->area() . "\n";
    echo "Perimeter: " . $shape->perimeter() . "\n";
}
// Usage
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
// Print details for each shape
printShapeDetails($circle); // Outputs the area and perimeter of the circle
printShapeDetails($rectangle); // Outputs the area and perimeter of the rectangle
?>
```
## Abstract Class
Abstract classes cannot be instantiated and are used to provide a base structure for other classes. They can contain abstract methods that must be defined in derived classes. Put simply, an abstract class is a class with at least one abstract method and with a abstract keyword in front of it. They get used for multiple reasons:
1. When we want be commit to writing certain class methods, or when we are only sure of there names.
2. When we want child classes to define these methods.
Abstract classes cannot be instantiated, and whatever non-abstract class derived from it must include actual implementations of all inherited abstract methods and properties.


| Interface                                                                       | Abstract Class                                                                 |
|---------------------------------------------------------------------------------|--------------------------------------------------------------------------------|
|An interface cannot have concrete methods in it i.e. methods with definition.    | An abstract class can have both abstract methods and concrete methods in it.   |
| All methods declared in interface should be public                              |An abstract class can have public, private and protected etc methods.           |
| Multiple interfaces can be implemented by one class.                            | One class can extend only one abstract class.                                  |