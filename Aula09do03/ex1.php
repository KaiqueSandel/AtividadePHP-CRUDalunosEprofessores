<?php
/**
 * A partir da classe Ponto realize:
 * • Crie um construtor que recebe dois parâmetros de coordenadas X e Y;
 * • Introduza um atributo de classe para contar o número de objetos criados
 * • Faça com que o construtor atualize o contador de pontos
 * • Acrescente um método de classe para retornar o valor desse atributo de contagem
 * • Acrescente um método para calcular e retornar a distância entre a instância do ponto e um outro objeto Ponto qualquer;
 * • Acrescente um método para calcular e retornar distância entre a instância do ponto e um outro ponto dado pelas coordenadas X e Y;
 * • Acrescente um método para calcular e retornar a distância entre dois pontos, dadas as coordenadas X1, Y1 e X2, Y2 (como este método não utiliza nenhum atributo parafazer este cálculo, ele pode ser criado como um método de classe)
 * A distância entre dois pontos é calculada por:
 * Função raiz quadrada: sqrt( )
 * Função potenciação: pow($base, $expoente)
 */
class Ponto {
    private $x;
    private $y;
    private static $contador = 0;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
        self::$contador++;
    }
    public static function getContador() {
        return self::$contador;
    }
    public function distanciaOutroPonto(Ponto $ponto) {
        $dx = $this->x - $ponto->getX();
        $dy = $this->y - $ponto->getY();
        return sqrt(pow($dx, 2) + pow($dy, 2));
    }
    public function distanciaCoordenadas($x, $y) {
        $dx = $this->x - $x;
        $dy = $this->y - $y;
        return sqrt(pow($dx, 2) + pow($dy, 2)); 
    }
    public static function distanciaEntre2Pontos($x1, $y1, $x2, $y2) {
        $dx = $x1 - $x2;
        $dy = $y1 - $y2;
        return sqrt(pow($dx, 2) + pow($dy, 2)); 
    }
    public function getX() {
        return $this->x;
    }
    public function getY() {
        return $this->y;
    }
}
$ponto1 = new Ponto(0, 0);
$ponto2 = new Ponto(3, 4);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pontos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 >Calculo de Pontos</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <?php 
                function render($ponto, $pontoReferencia) {
                    $output = '';
                    $output .= "<div class='card'>";
                    $output .= "<div class='card-body'>";
                    $output .= "<h5 class='card-title'>Distância entre ponto e ponto referência: " . $ponto->distanciaOutroPonto($pontoReferencia) . "</h5>";
                    $output .= "<p class='card-text'>Distância entre ponto e coordenadas (5, 6): " . $ponto->distanciaCoordenadas(5, 6) . "</p>";
                    $output .= "<p class='card-text'>Distância entre dois pontos: " . Ponto::distanciaEntre2Pontos(1, 1, 4, 5) . "</p>";
                    $output .= "</div>";
                    $output .= "</div>";
                    echo $output;
                }
                    render($ponto1, $ponto2);
                ?>
                </div>
                    <div class="col-md-6">
                        <?php render($ponto2, $ponto1); ?>
                    </div>
            </div>
    </div>
</body>
</html>
 