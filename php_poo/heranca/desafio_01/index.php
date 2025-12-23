<?php
// lauricio esteve aqui

class Funcionario
{
  protected $nome;
  protected $salario;

  public function __construct($nome, $salario)
  {
    $this->nome = $nome;
    $this->salario = $salario;
  }
  // retorno da informação de cada funcionario 
  public function getInfo()
  {
    return " nome : $this->nome ------ salario : $this->salario";
  }

  // todo funcinario recebe esta tipo por padrão
  public function getTipo()
  {
    return "Funcionario";
  }
  // este metodo é sobrescrito em cada uma das classes filhas de acordo com a nescessidade de cada uma.
  public function calcularBonus()
  {
    return $this->salario * 10 / 100;
  }
}

class Desenvolvedor extends Funcionario
{

  public function calcularBonus()
  {
    return $this->salario * 20 / 100;
  }

  // cada tipo de funcionario poderá definir sobreescrevendo o metodo da classe pai 
  public function getTipo()
  {
    return "Desenvolvedor";
  }
}

class Gerente extends Funcionario
{
  protected int $nivel;

  public function __construct($nome, $salario, $nivel)
  {
    // este construtor herda propriedades da classe pai;
    parent::__construct($nome, $salario);
    $this->nivel = $nivel;
  }
  // classe sobrescrita de acordo com o nivel de cada gerente
  public function calcularBonus()
  {
    return match ($this->nivel) {
      1 => $this->salario * 0.30,
      2 => $this->salario * 0.40,
      default => $this->salario * 0.50,
    };
  }

  public function getTipo()
  {
    return "Gerente";
  }
}

$comun = new Funcionario("Lauricio", 1400);
$developer = new Desenvolvedor("Mark zuker", 2400);
$manger = new Gerente("gosma", 3400, 2);

echo $comun->getTipo();
echo "<br>";
echo $comun->calcularBonus();
echo "<br> ------------ <br>";

echo ($developer->getInfo());
echo "<br>";
echo $developer->calcularBonus();
echo "<br> ------------ <br>";

print_r($manger->getInfo());
echo "<br>";
echo $manger->calcularBonus();
echo "<br> ------------ <br>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<br> -----bonus------- <br>";


// segunda parte bunus 

$funcionarios = [$comun, $developer, $manger];

foreach ($funcionarios  as $funcionario) {
  echo $funcionario->getInfo();
  echo $funcionario->getTipo();
  echo "<br>";
}
