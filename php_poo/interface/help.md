🧠 O que é uma INTERFACE? (bem direto)

Uma interface é um contrato.

Ela diz:

“Se você quiser me implementar,
você é OBRIGADO a ter esses métodos.”

📌 A interface não se importa como você faz,
ela só exige que exista.

❌ Interface NÃO é classe

Interface:

❌ Não tem atributos

❌ Não tem construtor

❌ Não tem lógica

✅ Só define métodos

🔹 Diferença mental (guarde isso)
Conceito	É o quê?
Classe abstrata	Molde parcial
Interface	Contrato puro

👉 Classe abstrata: “como algo é”
👉 Interface: “o que algo faz”

🔗 Ligando com SEU código

Você já tem:

abstract class Funcionario


Agora pense:

❓ Um funcionário pode receber bônus, certo?
❓ Mas no futuro pode existir algo que não seja funcionário e também receba bônus?

Exemplo:

Prestador de serviço

Parceiro

Freelancer

👉 BÔNUS é um comportamento, não uma classe.

💡 Isso é interface.

🧩 Criando sua PRIMEIRA interface
interface Bonificavel
{
    public function calcularBonus(): float;
}


📌 Isso significa:

“Qualquer coisa que implemente Bonificavel
TEM que ter calcularBonus().”

🔹 Implementando interface numa classe
class Desenvolvedor extends Funcionario implements Bonificavel
{
    public function calcularBonus(): float
    {
        return $this->salario * 0.20;
    }

    public function getTipo(): string
    {
        return "Desenvolvedor";
    }
}


📌 Palavra-chave:

implements

⚠️ Regra IMPORTANTE

Se você implementar uma interface:

❌ Não pode deixar método faltar
❌ Não pode mudar assinatura

Senão:

Class must implement interface method...

🔥 PONTO CHAVE — por que interface é poderosa

Agora olha isso 👇

$lista = [$dev, $gerente, $freelancer];

foreach ($lista as $item) {
    echo $item->calcularBonus();
}


👉 Não importa:

Se é Funcionario

Se é Freelancer

Se é Parceiro

📌 Só importa:

“Você implementa Bonificavel?”

🔥 Isso é polimorfismo por interface.

🆚 Interface vs Classe Abstrata (claro e honesto)
Situação	Use
Compartilhar código	Classe abstrata
Forçar comportamento	Interface
Herança única	Classe abstrata
Múltiplos comportamentos	Interface

📌 PHP só permite uma classe pai,
mas permite várias interfaces.

🧠 Exemplo mental (mundo real)

Classe abstrata → Funcionário

Interface → Pagável, Bonificável, Autenticável

Uma classe pode ser:

class Gerente extends Funcionario implements Bonificavel, Autenticavel


🔥 Poderoso demais.

🧪 EXERCÍCIO (agora é sua vez)

Vamos praticar do jeito certo.

🎯 Desafio – Interface Bonificavel
1️⃣ Crie a interface
interface Bonificavel
{
    public function calcularBonus(): float;
}

2️⃣ Faça Funcionario implementar a interface?

👉 NÃO ❌
Quem implementa são as classes concretas.

3️⃣ Implemente a interface em:

Desenvolvedor

Gerente

Use:

implements Bonificavel

4️⃣ Crie uma nova classe (sem herdar de Funcionario)
class Freelancer implements Bonificavel
{
    private float $valorContrato;

    public function __construct(float $valorContrato)
    {
        $this->valorContrato = $valorContrato;
    }

    public function calcularBonus(): float
    {
        return $this->valorContrato * 0.05;
    }
}


📌 Note:

NÃO herda de Funcionario

MAS recebe bônus

5️⃣ Teste polimorfismo por interface
$itens = [$dev, $gerente, $freelancer];

foreach ($itens as $item) {
    echo $item->calcularBonus();
}

🧠 Regra de ouro (grave isso)

🔹 Classe abstrata = o que algo é
🔹 Interface = o que algo faz
