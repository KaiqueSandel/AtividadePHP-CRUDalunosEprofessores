<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel P2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalhes da Empresa</h1>
        <div class="mb-3">
            <label class="form-label"><strong>ID:</strong></label>
            <p><?php echo e($empresa->id); ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Nome Fantasia:</strong></label>
            <p><?php echo e($empresa->nome_fantasia); ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>CNPJ:</strong></label>
            <p><?php echo e($empresa->cnpj); ?></p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Receita: R$</strong></label>
            <p><?php echo e($empresa->receita); ?></p>
        </div>
        <a href="<?php echo e(route('empresa.index')); ?>" class="btn btn-primary">Voltar</a>
    </div>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\Gerzka Arsbaron\Desktop\projeto-crud\projeto-crud\resources\views/empresa/show.blade.php ENDPATH**/ ?>