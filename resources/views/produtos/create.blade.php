<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('messages.produto') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> 
                                {{ Config::get('languages')[App::getLocale()]['display'] }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                            <span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> 
                                            {{$language['display']}}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @if(session('msg'))
        <p class="alert alert-success" role="alert"> 
            {{ session('msg')}} 
        </p>
    @endif
    @if(session('msg-delete'))
        <p class="alert alert-danger" role="alert"> 
            {{ session('msg-delete')}} 
        </p>
    @endif
    @if(session('msg-edit'))
        <p class="alert alert-warning" role="alert"> 
            {{ session('msg-edit')}} 
        </p>
    @endif
    <br><br>
    <div class="container form-group col-md-6">
        <h3>{{ __('messages.produto') }}</h3>

        <form action="{{ route('registrar-produto') }}" method="POST">
            @csrf
      
            <label for="">{{ __('messages.nome') }}</label><br>
            <input type="text" class="form-control" name="nome" required><br>

            <label for="">{{ __('messages.custo') }}</label><br>
            <input type="text" class="form-control" name="custo" required><br>

            <label for="">{{ __('messages.preco') }}</label><br>
            <input type="text" class="form-control" name="preco" required><br>
            
            <label for="">{{ __('messages.quantidade') }}</label><br>
            <input type="text" class="form-control" name="quantidade" required><br><br>
            
            <button class="btn btn-success btn-lg btn-block">{{ __('messages.salvar') }}</button><br><br>    
        </form>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('messages.id') }}</th>
                    <th scope="col">{{ __('messages.nome') }}</th>
                    <th scope="col">{{ __('messages.custo') }}</th>
                    <th scope="col">{{ __('messages.preco') }}</th>
                    <th scope="col">{{ __('messages.quantidade') }}</th>
                    <th scope="col">{{ __('messages.editar') }}</th>
                    <th scope="col">{{ __('messages.deletar') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($produto as $p)
                <tr>
                    <th scope="row">{{ $p->id }}</th>
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->custo }}</td>
                    <td>{{ $p->preco }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <td><a href="/produtos/editar/{{ $p->id }}"><button class="btn btn-warning">{{ __('messages.editar') }}</button></td>
                    <td><a href="/produtos/excluir/{{ $p->id }}"><button class="btn btn-danger">{{ __('messages.deletar') }}</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-center">
                {{ $produto->links() }}
            </ul>
        </nav>
</body>
</html>