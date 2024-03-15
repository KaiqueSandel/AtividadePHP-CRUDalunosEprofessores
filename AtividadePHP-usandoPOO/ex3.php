<?php
/**
 * Crie a seguinte hierarquia para representar diferentes tipos de telefones:
 * •Telefone: abstrata, representa o DDD e o número de um telefone, define um método abstrato calculaCusto (da ligação, recebe como parâmetro o tempo da ligacão)
 * •Fixo: derivada de Telefone, também armazena o custo por minuto, e sobrescreve calculaCusto, multiplicando o tempo da ligacão pelo custo do minuto
 * •Celular: abstrata, derivada de Telefone, também armazena o custo do minuto base, e o nome da operadora
 * •PrePago: derivada de Celular, calcula o custo da ligacão aplicando um acréscimo de 40% no custo do minuto base
 * •PosPago: derivada de Celular, calcula o custo da ligacão aplicando um desconto de 10% no custo do minuto base
 */
abstract class Telefone {
    protected $ddd;
    protected $numero;
    public function __construct($ddd, $numero) {
        $this->ddd = $ddd;
        $this->numero = $numero;
    }
    abstract public function calculaCusto($tempoLigacao);
}
class Fixo extends Telefone {
    protected $custoMinuto;
    public function __construct($ddd, $numero, $custoMinuto) {
        parent::__construct($ddd, $numero);
        $this->custoMinuto = $custoMinuto;
    }
    public function calculaCusto($tempoLigacao) {
        return $tempoLigacao * $this->custoMinuto;
    }
}
abstract class Celular extends Telefone {
    protected $custoMinutoBase;
    protected $operadora;
    public function __construct($ddd, $numero, $custoMinutoBase, $operadora) {
        parent::__construct($ddd, $numero);
        $this->custoMinutoBase = $custoMinutoBase;
        $this->operadora = $operadora;
    }
}
class PrePago extends Celular {
    public function calculaCusto($tempoLigacao) {
        $custoMinuto = $this->custoMinutoBase * 1.4; 
        return $tempoLigacao * $custoMinuto;
    }
}
class PosPago extends Celular {
    public function calculaCusto($tempoLigacao) {
        $custoMinuto = $this->custoMinutoBase * 0.9;
        return $tempoLigacao * $custoMinuto;
    }
}
$telefoneFixo = new Fixo("DDD_FIXO", "NUMERO_FIXO", 0.5);
$celularPrePago = new PrePago("DDD_CELULAR", "NUMERO_CELULAR", 0.7, "OPERADORA");
$celularPosPago = new PosPago("DDD_CELULAR", "NUMERO_CELULAR", 0.7, "OPERADORA");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 3</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Cálculo de Custo de Ligação</h1>
        <div class="row mt-3">
            <div class="col-md-4">
                <h2>Telefone Fixo</h2>
                <p>Custo para telefone fixo: R$ <?php echo $telefoneFixo->calculaCusto(10); ?></p>
            </div>
            <div class="col-md-4">
                <h2>Celular Pré-Pago</h2>
                <p>Custo para celular pré-pago: R$ <?php echo $celularPrePago->calculaCusto(10); ?></p>
            </div>
            <div class="col-md-4">
                <h2>Celular Pós-Pago</h2>
                <p>Custo para celular pós-pago: R$ <?php echo $celularPosPago->calculaCusto(10); ?></p>
            </div>
        </div>
    </div>
</body>
</html>
