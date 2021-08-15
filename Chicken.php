<?php
require_once "Animals.php";

class Chicken extends Animals
{
  public function __construct($name = '')
  {
    parent::__construct($name );
    $this->type = get_class($this);
    $this->measuring = 'шт.';
    $this->productivity = ['min' => 0, 'max' => 1];
  }
}