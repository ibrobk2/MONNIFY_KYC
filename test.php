<?php

class Fruit {
    public $name;
    public $color;
    public $weight;

  function __construct($name, $color, $weight)
  {
    $this->name = $name;
    $this->color = $color;
    $this->weight = $weight;


    
  }

  function get_name(){
    return $this->name;
}
}

$mango = new Fruit("Mango", "Red", 32);

echo $mango->get_name();









?>