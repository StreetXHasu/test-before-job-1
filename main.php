<?php
//Стандартная автозагрузка классов
include 'Farm.php';

try {

  $farm = new Farm();
  $farm->addBarn("Хлев 1");
  $farm->about();
  $farm->setName('Капитан Джек');
  $farm->getBarn(0)->setName('Хлев 2021');

  for ($i = 0; $i < 7; $i++) {
    $farm->getBarn(0)->addAnimal('Cow');
  }
  for ($i = 0; $i < 15; $i++) {
    $farm->getBarn(0)->addAnimal('Chicken');
  }




  $res = $farm->getBarn(0)->collection();
  foreach ($res as $resOne){
    echo "$resOne[name] $resOne[sum] $resOne[measuring]<br>\r";
  }


  // Вывод выглядит так себе, это чтобы в браузере чуть читабельней было :)
  echo "<br>\r";
  echo "Программа успешно завершена! <br>\r";
} catch (Exception $e) {
  echo 'Упс... ' . $e->getMessage();
  echo "<br>\r";
  echo "<br>\r";
  echo "Программа упала!!! <br>\r";
}
