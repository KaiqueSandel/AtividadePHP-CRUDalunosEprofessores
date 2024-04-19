<?php require '../src/View/cabecalho.php';
    if (issert($sucesso)){
        echo "<p>".$sucesso."</p>";
    } elseif (isset($falha)){
        echo "<p>".$falha."</p>";
    }
?>

<h1>Categorias</h1>
<a href="/categorias/criar/" class="btn btn-primary">Nova categoria</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Descricao</th>
            <th scope="col">Acoes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($c = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['descricao'] ?></td>
                <td>
                    <a href="/categorias/alterar/<? $c['id']?>" class="btn btn-warning">Alterar</a>
                    <a href="/categorias/excluir/<? $c['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="/categorias/visualizar/<? $c['id']?>" class="btn btn-info">Visualizar</a>        
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php require '../src/View/rodape.php'; ?>