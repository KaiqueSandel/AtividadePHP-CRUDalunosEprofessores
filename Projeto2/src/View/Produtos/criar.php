<?php require '../src/View/cabecalho.php'; ?>

<h1>Novo produto</h1>
<form method="POST" action="/produtos/criar">
    <div class="row">
        <div class="col">
            <label for="nome">Nome do produto: </label>
            <input type="text" name="nome" class="form-control" value="<?$resultado['nome']?>"/>
        </div>
        <div class="col">
            <label for="preco">Valor do produto: </label>
            <input type="number" name="preco" class="form-control" value="<?$resultado['preco']?>"/>
        </div>
        <div class="col">
            <label for="id_categoria">ID da Categoria do produto: </label>
            <input type="number" name="id_categoria" class="form-control" value="<?$resultado['id_categoria']?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" name="btnInserir" class="btn btn-primary" value="Inserir"/>    
        </div>
    </div>
</form>

<?php require '../src/View/rodape.php'; ?>