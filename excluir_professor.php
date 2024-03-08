<?php

  require_once("config.php");

  function excluirProfessor($id){
    global $pdo;
    $sql = "
        DELETE FROM professores WHERE id_professor = :id
    ";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->execute();
    header("Location: index.php?excluir=ok");
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

  if($_POST){
    if(isset($_POST['id_professor'])){
      excluirProfessor($_POST['id_professor']);
    }
  } elseif (isset($_GET['id_professor'])){
    $aluno = consultarPorId($_GET['id_professor']);
  } else {
    header("Location: index.php");
  }

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
    <h3>Excluir Professor</h3>
    <form action="excluir_professor.php" method="POST">
      <input type="hidden" name="id_professor" value="<?=$_GET['id_professor']?>"/>
      <div class="row">
        <div class="col-7">
          <label for="nome" class="form-label">Nome do professor:</label>
          <input disabled value="<?=$aluno['nome']?>" type="text" id="nome" name="nome" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="formacao" class="form-label">Formação do Professor:</label>
          <input disabled value="<?=$aluno['formacao']?>" type="text" id="formacao" name="formacao" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="telefone" class="form-label">Telefone do Professor:</label>
          <input disabled value="<?=$aluno['telefone']?>" type="text" id="telefone" name="telefone" class="form-control" required/>
        </div>
        <div class="col-5">
          <label for="email" class="form-label">Email do Professor:</label>
          <input disabled value="<?=$aluno['email']?>" type="text" id="email" name="email" class="form-control" required/>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button class="btn btn-danger" type="submit">
            Excluir Aluno
        </button>
        </div>
      </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>