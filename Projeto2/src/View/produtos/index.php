<?php require '../src/View/cabecalho.php';
    if (isset($sucesso)){
        echo "<p>".$sucesso."</p>";
    } elseif (isset($falha)){
        echo "<p>".$falha."</p>";
    }
?>

<h1>Produtos</h1>
<a href="/produtos/criar/" class="btn btn-primary">Novo produto</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Preço R$</th>
            <th scope="col">Categoria</th>
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
                <td><?= $c['preco'] ?></td>
                <td><?= $c['categoria'] ?></td>
                <td>
                    <a href="/produtos/alterar/<? $c['id']?>" class="btn btn-warning">Alterar</a>
                    <a href="/produtos/excluir/<? $c['id']?>" class="btn btn-danger">Excluir</a>
                    <a href="/produtos/visualizar/<? $c['id']?>" class="btn btn-info">Visualizar</a>        
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php require '../src/View/rodape.php'; ?>