<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title")</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <!-- CSS do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/style.css">
    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="/img/hdcevents_logo.svg" width="50" alt="Icon"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eventos/criar">Criar Evento</a>
                        </li>
                        @auth
                            <li class="nav-item me-2">
                                <a class="nav-link" href="/dashboard">Painel</a>
                            </li>
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="btn btn-primary" onclick="this.form.submit()">SAIR</button>
                            </form>
                            
                        
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a class="btn btn-outline-primary p-1 me-2" href="/register">REGISTRAR</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary p-1" href="/login">LOGAR</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @if(session('msg'))
        <div id="msgAlert" class="alert alert-success">
            {{session('msg')}}
            <button type="button" class="btn-close" onclick=" delDiv(this.parentNode)"></button>            
        </div>
    
        @endif

        @yield("content")
    </main>

    <footer>
        <p class="m-0 py-3 fs-4 text-white"> HDC Events &copy; 2020 </p>
    </footer>

</body>
<script src="/js/scripts.js"> </script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>