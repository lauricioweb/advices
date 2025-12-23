<?php
// iniciando estudo de hs


abstract class Funcionario
{
  protected string $nome;
  protected float $salario;
  protected string $cargo;

  public function __construct(string $nome, float $salario, string $cargo)
  {
    $this->nome = $nome;
    $this->salario = $salario;
    $this->cargo = $cargo;
  }

  // por padrão todos os funcionarios recebem 10% de bonus 
  abstract public function calculaBonus(): float;

  abstract public function mostraCargo(): string;
}

interface Bonificavel
{
  public function calculaBonus(): float;
  public function mostraCargo(): string;
}


class Desenvolvedor extends Funcionario implements Bonificavel
{
  // sobreescrevendo metodo calculaBonus;
  // Desenvolvedor recebe 20% de bonus 
  public function calculaBonus(): float
  {
    return $this->salario * 0.20;
  }

  public function mostraCargo(): string
  {
    return $this->cargo;
  }
}

class Gerente extends Funcionario implements Bonificavel
{
  protected int $tipo;

  public function __construct($nome, $salario, $cargo, $tipo)
  {
    parent::__construct($nome, $salario, $cargo);
    $this->tipo = $tipo;
  }

  public function calculaBonus(): float
  {
    return match ($this->tipo) {
      1 => $this->salario * 0.30,
      2 => $this->salario * 0.50,
      default => $this->salario * 0.60,
    };
  }

  public function  mostraCargo(): string
  {
    return $this->cargo;
  }
}

// agora aplicando a interface em um contratado freelancer

class Freelancer implements Bonificavel
{
  protected float $valorServico;

  public function __construct(float $valorServico)
  {
    $this->valorServico = $valorServico;
  }

  public function calculaBonus(): float
  {
    return $this->valorServico * 0.50;
  }

  public function mostraCargo(): string
  {
    return "Freelancer";
  }
}


// criando instancias;
$desenvolvedor = new Desenvolvedor("mark zuk", 5.599, "programador junior");
$gerente = new Gerente("pall allen", 9.500, "gerente", 3);
$freela = new Freelancer(4.200);

$bonusPagos = [$desenvolvedor, $gerente, $freela];

foreach ($bonusPagos as $bonus) {
  echo "cargo $bonus->mostraCargo() ||| bonus pago $bonus->calculaBonus()";
}
