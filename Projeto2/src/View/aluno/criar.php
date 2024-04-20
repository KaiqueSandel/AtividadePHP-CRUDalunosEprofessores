<?php require '../src/View/cabecalho.php'; ?>

<h1>Novo aluno</h1>
<form method="POST" action="/aluno/criar">
    <div class="row">
        <div class="col">
            <label for="nome">Nome do aluno: </label>
            <input type="text" name="nome" class="form-control" value="<?$resultado['nome']?>"/>
        </div>
        <div class="col">
            <label for="endereco">Endereço do aluno: </label>
            <input type="text" name="endereco" class="form-control" value="<?$resultado['endereco']?>"/>
        </div>
        <div class="col">
            <label for="telefone">Telefone do aluno: </label>
            <input type="text" name="telefone" class="form-control" value="<?$resultado['telefone']?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="submit" name="btnInserir" class="btn btn-primary" value="Inserir"/>    
        </div>
    </div>
</form>

<?php require '../src/View/rodape.php'; ?>