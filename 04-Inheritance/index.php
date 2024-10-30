<title>Inheritance</title>
<pre>

<?php
class Car
{
    public $carName;
    protected $carModel;
    private $carColor;

    public function __construct($name, $model, $color)
    {
        $this->carName = $name;
        $this->carModel = $model;
        $this->carColor = $color;
    }

    public function engine()
    {
        return 'Diesel';
    }

    public function carDetail()
    {
        return "Car name - $this->carName, Model is $this->carModel & color $this->carColor";
    }
}
class Tesla extends Car
{
    public $carOwner;

    public function __construct($name, $model, $color, $owner)
    {
        parent::__construct($name, $model, $color);
        $this->carOwner = $owner;
    }

    public function engine() // Override
    {
        return 'Electric';
    }

    public function carDetail()
    {
        return parent::carDetail() . " & Owner is $this->carOwner";
    }
}

$obj = new Tesla('Tesla', 'Tesla-X', 'Black', 'Ram Jondhale');
echo $obj->carDetail();
?>