<?php require '../src/View/cabecalho.php';
    if (isset($sucesso)){
        echo "<p>".$sucesso."</p>";
    } elseif (isset($falha)){
        echo "<p>".$falha."</p>";
    }
?>

<h1>Carro</h1>
<a href="/carros/criar/" class="btn btn-primary">Novo carro</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($c = $resultado->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <td><?= $c['nome'] ?></td>
                <td><?= $c['marca'] ?></td>
                <td><?= $c['modelo'] ?></td>
                <td>
                    <a href="/clientes/alterar/<? $c['id']?>" class="btn btn-warning">Alterar</a>
                    <a href="/clientes/excluir/<? $c['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="/clientes/visualizar/<? $c['id']?>" class="btn btn-info">Visualizar</a>        
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php require '../src/View/rodape.php'; ?>