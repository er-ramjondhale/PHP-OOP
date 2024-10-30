<title>Constructor & Destructor</title>
<pre>

<?php
class CarConstruct
{
    public $name = 'Car Name';

    public function __construct($carname)
    {
        $this->name = $carname;
        echo 'This is constructor function<br>';
    }

    public function getCarName()
    {
        return $this->name . "<br>";
    }

    public function __destruct()
    {
        echo 'This is the destructor function <br>';
    }
}

$car1 = new CarConstruct('Tata Nano');
echo $car1->getCarName(); // Tata Nano
$car2 = new CarConstruct('Tata Nexon');
echo $car2->getCarName(); // Tata Nexon
