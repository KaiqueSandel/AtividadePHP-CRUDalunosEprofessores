<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Excluir Carro</title>
  </head>
  <body>
    <main class="container">
        <h3>Excluir Carro</h3>
        <form action="/carro/deletar" method="post">
            <input type="hidden" name="id" value="<?= $resultado["id"] ?>">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" 
                                value="<?= $resultado['nome'] ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" name="marca" class="form-control" 
                                value="<?= $resultado['marca'] ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="ano" class="form-label">Ano:</label>
                    <input type="text" name="ano" class="form-control" 
                                value="<?= $resultado['ano'] ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
