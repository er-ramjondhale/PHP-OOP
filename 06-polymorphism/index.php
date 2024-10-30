<?php

// Base class
class Vehicle {
    protected $brand;

    // Constructor
    public function __construct($brand) {
        $this->brand = $brand;
    }

    // Method to start engine (to be overridden)
    public function startEngine() {
        return "The engine of the vehicle is starting.";
    }
}

// Derived class Car
class Car extends Vehicle {
    // Override the startEngine method
    public function startEngine() {
        return "The engine of the {$this->brand} car is starting with a roar!";
    }
}

// Derived class Bike
class Bike extends Vehicle {
    // Override the startEngine method
    public function startEngine() {
        return "The engine of the {$this->brand} bike is starting quietly.";
    }
}

// Function to demonstrate polymorphism
function startVehicleEngine(Vehicle $vehicle) {
    echo $vehicle->startEngine() . "\n";
}

// Create objects
$car = new Car("Toyota");
$bike = new Bike("Yamaha");

// Demonstrate polymorphism
startVehicleEngine($car); // Outputs: The engine of the Toyota car is starting with a roar!
echo '<br>';
startVehicleEngine($bike); // Outputs: The engine of the Yamaha bike is starting quietly.
?>
