<?php

abstract class Character2 implements characterInterface
{
  protected string $name;
  protected string $type;
  protected float $force;

  public function __construct(string $name, string $type, float $force)
  {
    $this->name = $name;
    $this->type = $type;
    $this->force = $force;
  }


  public function atack(): string
  {
    return "$this->name esta atacando";
  }
  public function defend(): string
  {
    return "$this->name esta defendendo";
  }
  public function showTipe(): string
  {
    return $this->type;
  }

  public function showForce(): float
  {
    return $this->force;
  }
}

interface characterInterface
{
  public function atack(): string;
  public function defend(): string;
  public function showTipe(): string;
}

class Vilan2 extends Character2 {}

class Hero2 extends Character2 {}

// criando personagegem de fora da classe;
class Alternative implements characterInterface
{
  protected string $name;
  protected string $type;
  protected float $force;

  public function __construct()
  {
    $this->name = "alternative";
    $this->type = "alternative";
    $this->force = 300.32;
  }

  public function atack(): string
  {
    return "$this->name esta atacando";
  }

  public function defend(): string
  {
    return "$this->name esta defendendo";
  }

  public function showTipe(): string
  {
    return $this->type;
  }
}


// instanciando;

$marvado = new Vilan2("marvado", "vilão", 53.22);
$supercu = new Hero2("super cuzim", "heroi", 65.23);
$assistente = new Alternative();


$characters = [$marvado, $supercu, $assistente];
foreach ($characters as $character) {
  echo $character->atack();
  echo "<br>";
  echo $character->defend();
  echo "<br>";
}
