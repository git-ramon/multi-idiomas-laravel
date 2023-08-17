<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Produto</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container form-group col-md-6"><br><br>
        <h3>{{ __('messages.deletar-produto') }}</h3><br><br>

        <form action="{{ route('excluir-produto', ['id' => $produto->id]) }}" method="POST">
            @csrf
            <label for="">{{ __('messages.confirmar-deletar') }}</label><br>
            <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}"><br>

            <button class="btn btn-danger">{{ __('messages.deletar') }}</button>
            <button" onClick="document.location.href='http://localhost:8000/produtos/novo';" class="btn btn-secondary">{{ __('messages.cancelar') }}</button>
        </form>
    </div>
</body>
</html>