<?php

  require_once("config.php");

  function alterarProfessor($id, $nome, $formacao, $telefone, $email, $aluno_id){
    global $pdo;
    $sql = "
        UPDATE professores 
        SET nome = :nome, formacao = :formacao, telefone = :telefone, email = :email, aluno_id = :aluno_id
        WHERE id_professor = :id
    ";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":nome", $nome);
    $stm->bindParam(":formacao", $formacao);
    $stm->bindParam(":telefone", $telefone);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":aluno_id", $aluno_id); 
    $stm->bindParam(":id", $id);
    $stm->execute();
    header("Location: index.php?alterar=ok");
    exit();
}

  function consultarPorId($id){
    global $pdo;
    $sql = "SELECT * FROM professores where id_professor = :id";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

if ($_POST) {
    if (isset($_POST['nome']) && isset($_POST['formacao']) && isset($_POST['telefone']) && isset($_POST['email'])) {
        alterarProfessor($_POST['id_professor'], $_POST['nome'], $_POST['formacao'], $_POST['telefone'], $_POST['email'], $_POST['aluno_id']);
    }
} elseif (isset($_GET['id_professor'])) {
    $professor = consultarPorId($_GET['id_professor']);
} else {
    header("Location: index.php");
}
function consultarAlunos(){
   global $pdo;
   $sql = "SELECT * FROM aluno";
   $stm = $pdo->query($sql);
   return $stm->fetchAll(PDO::FETCH_ASSOC);
}
$alunos = consultarAlunos();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="container">
    <h3>Alterar Professor</h3>
    <form action="alterar_professor.php" method="POST">
      <input type="hidden" name="id_professor" value="<?=$_GET['id_professor']?>"/>
      <div class="row">
        <div class="col-7">
          <label for="nome" class="form-label">Informe o nome:</label>
          <input value="<?=$professor['nome']?>" type="text" id="nome" name="nome" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="formacao" class="form-label">Informe a formação:</label>
          <input value="<?=$professor['formacao']?>" type="text" id="formacao" name="formacao" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="telefone" class="form-label">Informe o telefone:</label>
          <input value="<?=$professor['telefone']?>" type="text" id="telefone" name="telefone" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="email" class="form-label">Informe o telefone:</label>
          <input value="<?=$professor['email']?>" type="text" id="email" name="email" class="form-control" required/>
        </div>
        <div class="col-5">
        <label for="curso" class="form-label">informe o aluno:  </label>
        <select id="aluno" name="aluno_id">
            <?php foreach($alunos as $alunoItem): ?>
                <option value="<?= $alunoItem['id']?>"><?= $alunoItem['nome'] ?></option>
            <?php endforeach; ?>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button class="btn btn-primary" type="submit">Salvar Dados</button>
        </div>
      </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>