<?php

class Person
{
  public $name, $age;

  public function __construct($name, $age)
  {
    $this->name = $name;
    $this->age = $age;
  }
}

// $person_1 = new Person();
// $person_1->name = "ricky damar saputra";
// $person_1->age = 17;

$person_1 = new Person("ricky damar saputra", 17);

var_dump($person_1);

echo $person_1->name . PHP_EOL;
