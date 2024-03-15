<?php
/**
 * A partir da classe Funcionario, desenvolva as seguintes classes:
 * •Servente: classe derivada da classe Funcionario. Um servente recebe um adicional de 5% a título de insalubridade
 * •Motorista: classe derivada da classe Funcionario. Para cada motorista é necessário armazenar o número da carteira de motorista
 * •MestreDeObras: classe derivada da classe Servente. Para cada mestre de obras é necessário armazenar quantos funcionarios estão sob sua supervisão. Um mestre de obras ganha um adicional de 10% para cada grupo de 10 funcionários que estão sob seu comando.
 * •Em todas as classes devem ser acrescentados os métodos get/set necessários.
 */
class Funcionario {
    private string $nome;
    private int $codigo;
    private float $salarioBase;
    public function __construct($codigo, $nome, $salarioBase) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
    }
    public function getNome(){
        return $this->nome; 
    }
    public function getCodigo(){ 
        return $this->codigo;
    }
    public function getSalarioBase(){ 
        return $this->salarioBase;
    }
    public function setSalarioBase($salarioBase) {
        $this->salarioBase = $salarioBase;
    }
    public function getSalarioLiquido(){
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;
        if ($this->salarioBase > 2000){
            $ir = ($this->salarioBase-2000.0)*0.12;
            return ($this->salarioBase - $inss - $ir);
        }
    }
    public function __toString(){
        return get_class($this) . "\n Codigo: " . 
        $this->getCodigo() . "\n Nome: " . 
        $this->getNome() . "\n Salario Base: " . 
        $this->getSalarioBase() . "\n Salario liquido: " . 
        $this->getSalarioLiquido();
    }
}
class Servente extends Funcionario {
    public function getSalarioLiquido(){
        return parent::getSalarioLiquido() + (5/100 * $this->getSalarioBase());
    }
}
class Motorista extends Funcionario {
    private string $cnh;
    public function __construct($codigo, $nome, $salarioBase, string $cnh) {
        parent::__construct($codigo, $nome, $salarioBase);
        $this->cnh = $cnh;
    }
    public function getCNH(){
        return $this->cnh;
    }
    public function setCNH($cnh){
        return $this->cnh = $cnh;
    }
}
class MestreDeObras extends Servente {
    protected $qtdFuncionariosSupervisionados;
    public function __construct($codigo, $nome, $salarioBase, $qtdFuncionariosSupervisionados) {
        parent::__construct($codigo, $nome, $salarioBase);
        $this->qtdFuncionariosSupervisionados = $qtdFuncionariosSupervisionados;
    }
    public function getSalarioLiquido() {
        $adicional = floor($this->qtdFuncionariosSupervisionados / 10) * ($this->getSalarioBase() * 0.1);
        return parent::getSalarioLiquido() + $adicional;
    }
}

$mestre = new MestreDeObras(2, 'Gerzka', 50000, 30);
$motorista = new Motorista(1, 'Yoru', 100, 'CNH123');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apresentação de Salários</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 >Apresentação de Salários</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <?php 
                function render($funcionario) {
                    $output = '';
                    $output .= "<div class='card'>";
                    $output .= "<div class='card-body'>";
                    $output .= "<h5 class='card-title'>Nome: " . $funcionario->getNome() . "</h5>";
                    $output .= "<p class='card-text'>Tipo: " . get_class($funcionario) . "</p>";
                    $output .= "<p class='card-text'>Salário: R$ " . $funcionario->getSalarioLiquido() . "</p>";
                    $output .= "</div>";
                    $output .= "</div>";
                    echo $output;
                }
                echo render($mestre);
                ?>
            </div>
            <div class="col-md-6">
                <?php echo render($motorista); ?>
            </div>
        </div>
    </div>
</body>
</html>
