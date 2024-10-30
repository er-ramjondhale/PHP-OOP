# PHP Object-Oriented Programming (OOP) Guide

OOP is a programming style in which we group methods and variables of a particular topic into single class. For example, the code that relate users will be in User class. OOP is heavily adopted because it support code organization, provides modularity and reduces the need to repeat ourselves.
- **Encapsulation:** data and the operations that manipulate the data (the code) are both encapsulated in the object.
- **Inheritance:** A class can inherit from another class and take advantage of the methods and properties defined by the superclass. (is a)
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