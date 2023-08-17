<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizualizar Produtos</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container form-group col-md-6"><br><br>
        <h3>{{ __('messages.editar-produto') }}</h3>

        <form action="{{ route('alterar-produto', ['id' => $produto->id]) }}" method="POST">
            @csrf
            <label for="">{{ __('messages.nome') }}</label><br>
            <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}" required><br>

            <label for="">{{ __('messages.custo') }}</label><br>
            <input type="text" class="form-control" name="custo" value="{{ $produto->custo }}" required><br>

            <label for="">{{ __('messages.preco') }}</label><br>
            <input type="text" class="form-control" name="preco" value="{{ $produto->preco }}" required><br>
            
            <label for="">{{ __('messages.quantidade') }}</label><br>
            <input type="text" class="form-control" name="quantidade" value="{{ $produto->quantidade }}" required><br><br>
            <button class="btn btn-warning">{{ __('messages.editar') }}</button>
            <button" onClick="document.location.href='http://localhost:8000/produtos/novo';" class="btn btn-secondary">{{ __('messages.cancelar') }}</button>
        </form>

    </div>
</body>
</html>