<?php
require_once 'Barn.php';
require_once 'Chicken.php';
require_once 'Cow.php';



class Animals
{
  public function __construct($name = '')
  {
    $this->name = $name;
  }
  //Сбор ресурсов
  public function production(object $obj): int
  {
    return random_int($obj->productivity['min'],$obj->productivity['max']);
  }
  public function getAnimal($id): object
  {
    if ($this->animals[$id]) {
      return $this->animals[$id];
    }
    throw new Exception('Нет такого животного!');
  }
}
