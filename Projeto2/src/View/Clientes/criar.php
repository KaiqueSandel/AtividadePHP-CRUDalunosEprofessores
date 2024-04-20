<?php require '../src/View/cabecalho.php'; ?>

<h1>Novo cliente</h1>
<form method="POST" action="/clientes/criar">
    <div class="row">
        <div class="col">
            <label for="nome">Nome do cliente: </label>
            <input type="text" name="nome" class="form-control" value="<?$resultado['nome']?>"/>
        </div>
        <div class="col">
            <label for="endereco">Endereco do cliente: </label>
            <input type="text" name="endereco" class="form-control" value="<?$resultado['endereco']?>"/>
        </div>
        <div class="col">
            <label for="numero_conta">Numero da conta do cliente: </label>
            <input type="number" name="numero_conta" class="form-control" value="<?$resultado['numero_conta']?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" name="btnInserir" class="btn btn-primary" value="Inserir"/>    
        </div>
    </div>
</form>

<?php require '../src/View/rodape.php'; ?>