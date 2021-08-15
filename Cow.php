<?php
require_once "Animals.php";

class Cow extends Animals
{
  public function __construct($name = '')
  {
    parent::__construct($name );
    $this->type = get_class($this);
    $this->measuring = 'л.';
    $this->productivity = ['min' => 8, 'max' => 12];
  }

}