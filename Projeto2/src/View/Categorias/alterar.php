<?php require '../src/View/cabecalho.php'; ?>

<h1>Alterar categoria</h1>
<form method="POST" action="/categorias/editar/<?$resultado['id']?>">
    <div class="row">
        <div class="col">
            <label for="descricao"> Informe a descrição da categoria: </label>
            <input type="text" name="descricao" class="form-control" value="<?$resultado['descricao']?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" name="btnAlterar" class="btn btn-primary" value="Alterar"/>    
        </div>
    </div>
</form>

<?php require '../src/View/redope.php'; ?>