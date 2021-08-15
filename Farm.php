<?php
require_once "Barn.php";

class Farm extends Barn
{

  /**
   * @var string Добавляем наименования.
   */
  public $name = '';

  /**
   * Farm constructor.
   * @param string $name
   */
  public function __construct(string $name = 'Дядюшка Джек')
  {
    parent::__construct();
    $this->name = $name;
  }

  /**
   * О ферме
   */
  public function about()
  {
    echo "Добро пожаловать на ферму \"$this->name\"! <br>\r";
    //количество хлевов
    $count = $this->getBarns() ? count($this->getBarns()) : 0 ;
    echo "Количечество хлевов на нашей ферме:  $count <br>\r";
    if ($count) {
      echo "Список текущих хлевов:<br>\r";
      foreach ($this->getBarns() as $k => $barn) {
        //количество животных
        $count = $barn->animals ? count($barn->animals) : 0;
        echo "№ $k - $barn->name - Животных внутри: $count <br>\r";
      }
    }
  }

  /**
   * @param $name string Устанавливает имя фермы
   */
  public function setName(string $name = '')
  {
    $this->name = $name;
    echo "Новое имя фермы $this->name! <br>\r";
  }

}
