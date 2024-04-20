<?php require '../src/View/cabecalho.php';
    if (isset($sucesso)){
        echo "<p>".$sucesso."</p>";
    } elseif (isset($falha)){
        echo "<p>".$falha."</p>";
    }
?>

<h1>Alunos</h1>
<a href="/alunos/criar/" class="btn btn-primary">Novo Aluno</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Telefone</th>
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
                <td><?= $c['endereco'] ?></td>
                <td><?= $c['telefone'] ?></td>
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