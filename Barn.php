<?php
require_once 'Animals.php';
/**
 * @property array barns Массив хлевов.
 */
class Barn extends Animals
{
  /**
   * Barn constructor. Хоть он ничего нового не делает и перезаписывает уже имеющийся. Но так как мы создаём копию этого объекта в отдельности. Нам нужно продублировать его. Можно использовать для этого трейты.
   * @param string $name
   */
  public $name = '';

  public function __construct($name = '')
  {
    parent::__construct();
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
    if ($this->barns) {
      return $this->barns;
    }
    return [];
  }

  public function getBarn($id): object
  {
    if ($this->barns[$id]) {
      return $this->barns[$id];
    }
    throw new Exception('Нет такого хлева!');
  }

  /**
   * @param string $name Сеттер имени
   */
  public function setName(string $name = '')
  {
    $this->name = $name;
    echo "Новое имя хлева $this->name! <br>\r";
  }

  public function collection()
  {
    //TODO: Сделать проверку на раз в сутки, а не вот это вот. (пример)
    if ($this->collected){  // Если уже собрали, то не разрешаем ещё.
      throw new Exception('Уже собрано!');
    }
    $sum = array();
    $measuring = array();
    foreach ($this->animals as $animal) {
      $sum[$animal->type] += $animal->production($animal); // собираем ресурсы
      $measuring[$animal->type] = $animal->measuring; // ед. измерения
    }

    $res['sum'] = ['sum'=> 0,'name'=>'Всего']; // это лайхак, чтобы всего было в начале массива.
    //перебор и суммирование резултатов
    foreach ($measuring as $key => $type) {
      $res[$key] = [
        'name' => $key,
        'sum' => $sum[$key],
        'measuring' => $type];
      $all +=$sum[$key];
    }
    $res['sum'] = ['sum'=>$all,'name'=>'Всего']; // добавляем сумму
    $this->collected = $res;
    echo "Вы собрали всё что было! <br>\r";
    return $res;
  }

  public function addAnimal($type, $name = '')
  {
    if (!$name) {
      $name = $type;
    }
    //Проверяем есть ли такое животное (класс)
    if (!class_exists($type)) {
      throw new Exception("$type - что это за зверь такой?");
    }
    $this->animals[] = new $type($name);
    echo "Добавил $name! <br>\r";
    return true;
  }
}