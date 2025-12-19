<?php

class Funcionario
{
  protected string $nome;
  protected float $salario;

  public function __construct(string $nome, float $salario)
  {
    $this->nome = $nome;
    $this->salario = $salario;
  }

  public function get_info()
  {
    return " nome : $this->nome ------ salario : $this->salario ";
  }

  public function calcular_bonus()
  {
    return $this->salario * 10 / 100;
  }
}

class Desenvolvedor extends Funcionario
{

  public function calcular_bonus()
  {
    return $this->salario * 20 / 100;
  }
}

class Gerente extends Funcionario
{
  protected int $nivel;

  public function __construct($nome, $salario, $nivel)
  {
    $this->nome = $nome;
    $this->salario = $salario;
    $this->nivel = $nivel;
  }

  public function calcular_bonus()
  {
    if ($this->nivel == 30) {
      return $this->salario * 0.30;
    } elseif ($this->nivel == 40) {
      return $this->salario * 0.40;
    } else {
      return $this->salario * 0.50;
    }
  }
}


$comun = new Funcionario("func_comun", 1.400);

echo "<br> ------------------------- <br>";
print_r($comun);
$salario_comun = $comun->calcular_bonus();
echo "<br> ------- salario comun : $salario_comun ------------------ <br>";


$dev = new Desenvolvedor("func_dev", 2.500);

echo "<br> ------------------------- <br>";
print_r($dev);
$salario_dev = $dev->calcular_bonus();
echo "<br> ----------- salario dev : $salario_dev -------------- <br>";

$manager = new Gerente("func_gerente", 4.600, 2);

echo "<br> ------------------------- <br>";
print_r($manager);
$salario_manager = $manager->calcular_bonus();
echo "<br> ------ salario gerente  :  $salario_manager ------------------- <br>";
