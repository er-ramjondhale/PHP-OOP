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

## Class and Object
 [index.php](01-Class-and-Object/index.php)

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

$car = new Car("Toyota", "Camry"); // define object
echo $car->getCarInfo(); // Make: Toyota, Model: Camry
?>
```

## Constructor and Destructor 
 [index.php](02-Constructor-and-Destructor/index.php)

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
 [index.php](03-Access-Modifier/index.php)

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
[index.php](04-Inheritance/index.php)

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
 [index.php](05-encapsulation/index.php)

Encapsulation restricts direct access to object properties, ensuring control through getters and setters.
```php
<?php
class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount();
$account->deposit(100);
echo $account->getBalance(); // Output: 100
?>
```

## Polymorphism
 [index.php](06-polymorphism/index.php)

Put simply, Polymorphism is a principle that state that methods in different classes doing similar things should have the same name.
```php
<?php
interface Animal {
    public function sound();
}

class Cat implements Animal {
    public function sound() {
        return "Meow";
    }
}

class Dog implements Animal {
    public function sound() {
        return "Bark";
    }
}

function makeSound(Animal $animal) {
    echo $animal->sound();
}

$cat = new Cat();
$dog = new Dog();
makeSound($cat); // Output: Meow
makeSound($dog); // Output: Bark
?>
```

## Interface
[index.php](07-interface/index.php)

An interface can be seen as an outline of what a particular object can do. They are considered one of the main building blocks of the SOLID pattern. With interfaces we can create code which specifies which methods a class must implement, without having to define how these methods are implemented.
```php
<?php
interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        echo "Logging to file: $message";
    }
}

class ConsoleLogger implements Logger {
    public function log($message) {
        echo "Logging to console: $message";
    }
}

$logger = new FileLogger();
$logger->log("An error occurred"); // Output: Logging to file: An error occurred
?>
```
## Abstract Class
[index.php](08-abstract/index.php)

They can contain abstract methods that must be defined in derived classes. Put simply, an abstract class is a class with at least one abstract method and with a abstract keyword in front of it. They get used for multiple reasons:

1. When we want be commit to writing certain class methods, or when we are only sure of there names.
2. When we want child classes to define these methods.

Abstract classes cannot be instantiated, and whatever non-abstract class derived from it must include actual implementations of all inherited abstract methods and properties.
```php
<?php
abstract class Shape {
    abstract public function area();
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

$circle = new Circle(5);
echo $circle->area(); // Output: 78.539816339744
?>
```

| **Interface**                                                                   | **Abstract Class**                                                             |
|---------------------------------------------------------------------------------|--------------------------------------------------------------------------------|
|An interface cannot have concrete methods in it i.e. methods with definition.    | An abstract class can have both abstract methods and concrete methods in it.   |
| All methods declared in interface should be public                              |An abstract class can have public, private and protected etc methods.           |
| Multiple interfaces can be implemented by one class.                            | One class can extend only one abstract class.                                  |

## Traits
[index.php](09-traits/index.php)

**Traits** are a mechanism for code reuse. A Trait is intended to reduce some limitations of single inheritance by enabling a developer to reuse sets of methods freely in several independent classes living in different class hierarchies.
A Trait is similar to a class, but only intended to group functionality in a fine-grained and consistent way. It is not possible to instantiate a Trait on its own.
```php
<?php
trait Loggable {
    public function log($message) {
        echo "Log: $message";
    }
}
class App {
    use Loggable;
}
$app = new App();
$app->log("Application started"); // Output: Log: Application started
?>
```


## Namespace
[index.php](10-namespace/index.php)

**Namespaces** in PHP help organize code and prevent name collisions in larger projects. They allow developers to group related classes and functions, making it easier to manage code when multiple items have the same name.
```php
<?php

namespace Animals;

class Dog {
    public function sound() {
        return "Bark!";
    }
}
// Using the classes
$dog = new \Animals\Dog();
echo $dog->sound(); // Outputs: Bark!
?>


<?php
namespace Vehicles;

class Car {
    public function honk() {
        return "Beep!";
    }
}


$car = new \Vehicles\Car();
echo $car->honk(); // Outputs: Beep!
?>
```