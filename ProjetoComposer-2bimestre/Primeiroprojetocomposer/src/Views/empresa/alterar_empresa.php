<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
        <h3>Alterar Empresa</h3>
        <form action="/empresa/editar" method="post">
            <input type="hidden" name="id" value="<?= $resultado["id"] ?>">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nome_fantasia" class="form-label">Nome Fantasia:</label>
                    <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" 
                                value="<?= $resultado['nome_fantasia'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="cnpj" class="form-label">CNPJ:</label>
                    <input type="text" name="cnpj" id="cnpj" class="form-control" 
                                value="<?= $resultado['cnpj'] ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="receita" class="form-label">Receita:</label>
                    <input type="number" step="0.01" name="receita" id="receita" class="form-control"
                                value="<?= $resultado['receita'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                                            Salvar
                    </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
