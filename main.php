<?php
require_once "Farm.php";

$farm = new Farm();
$farm->addBarn("Хлев 1");
$farm->about();
$farm->setName('Капитан Джек');
$farm->getBarn(0)->setName('Хлев 2021');

echo "Конец программы <br>\r";