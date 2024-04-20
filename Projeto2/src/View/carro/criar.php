<?php require '../src/View/cabecalho.php'; ?>

<h1>Novo carro</h1>
<form method="POST" action="/carro/criar">
    <div class="row">
        <div class="col">
            <label for="nome">Nome do carro: </label>
            <input type="text" name="nome" class="form-control" value="<?$resultado['nome']?>"/>
        </div>
        <div class="col">
            <label for="marca">Marca do carro: </label>
            <input type="text" name="marca" class="form-control" value="<?$resultado['marca']?>"/>
        </div>
        <div class="col">
            <label for="modelo">Modelo do carro: </label>
            <input type="text" name="modelo" class="form-control" value="<?$resultado['modelo']?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" name="btnInserir" class="btn btn-primary" value="Inserir"/>    
        </div>
    </div>
</form>

<?php require '../src/View/rodape.php'; ?>