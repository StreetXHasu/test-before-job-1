<?php
require_once 'Farm.php';

/**
 * @property array barns Массив хлевов.
 */
class Barn
{

  /**
   * Barn constructor. Хоть он ничего нового не делает и перезаписывает уже имеющийся. Но так как мы создаём копию этого объекта в отдельности. Нам нужно продублировать его. Можно использовать для этого трейты.
   * @param string $name
   */
  public $name = '';

  public function __construct($name = '')
  {
    $this->name = $name;

  }

  /**
   * @param $name Barn Добавляем новый хлев
   */
  public function addBarn($name = '')
  {
    $this->barns[] = new Barn($name);
  }

  public function getBarns(): array
  {
    return $this->barns;
  }

  public function getBarn($id): object
  {
    return $this->barns[$id];
  }

  /**
   * @param string $name Сеттер имени
   */
  public function setName(string $name = '')
  {
    $this->name = $name;
    echo "Новое имя хлева $this->name! <br>\r";
  }


}