<title>Class & Object</title>
<pre>

<?php
class Car
{
    public $name = 'Car Name';
    public function setCarName($carname)
    {
        $this->name = $carname;
    }

    public function getCarName()
    {
        return $this->name . "<br>";
    }
}

$car = new Car();
echo $car->getCarName(); // Car Name
$car->name = 'Tata Nano';
echo $car->getCarName(); // Tata Nano
$car->setCarName('Tata Nexon');
echo $car->getCarName(); // Tata Nexon
?>