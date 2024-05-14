<?php

    require_once("config.php");

    function consultarAlunos(){
        global $pdo;
        $sql = "SELECT * FROM aluno";
        $stm = $pdo->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    function consultarProfessores(){
        global $pdo;
        $sql = "SELECT * FROM professores";
        $stm = $pdo->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="container">
    <h3>Hello, world!</h3>

    <?php
        if(isset($_GET['inserir'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Registro inserido com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <?php
        if(isset($_GET['alterar'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Registro alterado com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <?php
        if(isset($_GET['excluir'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Registro excluído com sucesso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <a href="inserir_aluno.php" class="btn btn-info">Inserir novo Aluno</a>
    
    <table class="table table-info table-striped table-hover">
        <thead>
            <tr>
                <th>Nome do Aluno</th>
                <th>Curso do Aluno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
           <?php
                $dados = consultarAlunos();
                if($dados != null){
                    foreach ($dados as $d){
                        echo "<tr>
                                <td>{$d['nome']}</td>
                                <td>{$d['curso']}</td>
                                <td><a href='alterar_aluno.php?id={$d['id']}'>Alterar</a>
                                    <a href='excluir_aluno.php?id={$d['id']}'>Excluir</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>💀ERROR! Tabela Alunos = Vazia!</td></tr>";
                }
           ?>
        </tbody>
    </table>

    <a href="inserir_professor.php" class="btn btn-info">Inserir novo Professor</a>
    
    <table class="table table-info table-striped table-hover">
        <thead>
            <tr>
                <th>Nome do Professor</th>
                <th>Formação do Professor</th>
                <th>Telefone do Professor</th>
                <th>Email do Professor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
           <?php
                $dados = consultarProfessores();
                if($dados != null){
                    foreach ($dados as $d){
                        echo "<tr>
                                <td>{$d['nome']}</td>
                                <td>{$d['formacao']}</td>
                                <td>{$d['telefone']}</td>
                                <td>{$d['email']}</td>
                                <td><a href='alterar_professor.php?id_professor={$d['id_professor']}'>Alterar</a>
                                    <a href='excluir_professor.php?id_professor={$d['id_professor']}'>Excluir</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>💀ERROR! Tabela Professores = Vazia!</td></tr>";
                }
           ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>