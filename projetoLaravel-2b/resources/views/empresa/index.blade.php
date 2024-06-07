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
    <main class="container">
        <h1>Empresas</h1>
        <a href="{{ route('empresa.create') }}" class="btn btn-primary">Inserir Empresa</a>
        <table class="table table-stripped table-hover">
            <tr>
                <td>Nome Fantasia</td>
                <td>Ações</td>
            </tr>
            @foreach ($empresa as $e)
            <tr>
                <td>{{ $e->nome_fantasia }}</td>
                <td> 
                    <a href="{{ route('empresa.show', $e->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('empresa.edit', $e->id)}}">Alterar</a> 
                    <a href="/empresa/delete/{{$e->id}}">Excluir</a> 
                </td>
            </tr>
            @endforeach
        </table>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>

</body>
</html>