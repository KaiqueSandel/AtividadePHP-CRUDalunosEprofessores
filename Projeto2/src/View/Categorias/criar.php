<?php require '../src/View/cabecalho.php'; ?>

<h1>Nova categoria</h1>
<form method="POST" action="/categorias/salvar">
    <div class="row">
        <div class="col">
            <label for="descricao"> Informe a descrição da categoria: </label>
            <input type="text" name="descricao" class="form-control" value="<?$resultado['descricao']?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" name="btnInserir" class="btn btn-primary" value="Inserir"/>    
        </div>
    </div>
</form>

<?php require '../src/View/redope.php'; ?>