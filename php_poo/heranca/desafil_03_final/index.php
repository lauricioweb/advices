<?php

interface Turnable
{
  public function turn(): string;
}

abstract class Character implements Turnable
{
  private string $name;

  abstract public function action(): string;
  public function prepare(): string
  {
    return "preparando ...";
  }

  public function finish(): string
  {
    return "finalizando...";
  }

  final public function turn(): string
  {
    return $this->action() . $this->prepare() . $this->finish();
  }
}


class Hero extends Character
{
  public function action(): string
  {
    return "heroi atacando..";
  }
}

class Monster extends Character
{
  public function action(): string
  {
    return " mostro atacando...";
  }
}

class Trap implements Turnable
{
  public function action(): string
  {
    return "trap atacando..";
  }

  public function prepare(): string
  {
    return "preparando ...";
  }

  public function finish(): string
  {
    return "finalizando";
  }

  public function turn(): string
  {
    return $this->action() . $this->prepare() . $this->finish();
  }
}

$hero = new Hero;
$moster = new Monster;
$trap = new Trap;


$turns = [$hero, $moster, $trap];

foreach ($turns as $turn) {
  echo $turn->turn();
  echo "<br>";
}
