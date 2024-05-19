<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
        <h3>Excluir Empresa</h3>
        <form action="/empresa/deletar" method="post">
            <input type="hidden" name="id" value="<?= $resultado["id"] ?>">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nome_fantasia" class="form-label">Nome Fantasia:</label>
                    <input type="text" disabled name="nome_fantasia" 
                        class="form-control" value="<?= $resultado['nome_fantasia'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="cnpj" class="form-label">CNPJ:</label>
                    <input type="text" disabled name="cnpj" 
                        class="form-control" value="<?= $resultado['cnpj'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="receita" class="form-label">Receita:</label>
                    <input type="number" step="0.01" disabled name="receita" 
                        class="form-control" value="<?= $resultado['receita'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Você deseja realmente excluir esse registro?</p>
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
