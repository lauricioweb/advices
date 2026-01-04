<?php
// classe pai
abstract class Character
{
  protected string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  abstract public function showName(): string;
}

// classe filha com metodos e propriedades especificas

class Hero extends Character
{
  // propriedade especifica
  protected $power;

  // adicionando propriedade ao proprio constructor
  public function __construct(string $name, string $power)
  {

    // usando constructor da classe pai;
    parent::__construct($name);
    $this->power = $power;
  }


  // implementando metodos obrigatorio
  public function showName(): string
  {
    return "hi my name is : $this->name";
  }

  // implementando methodo especifico
  public function showMyPower(): string
  {
    return  "my powe is $this->power";
  }
}


//instanciando classe:

$hero = new Hero("supermal", "voar e sumir");
$hero->showName();
$hero->showMyPower();
