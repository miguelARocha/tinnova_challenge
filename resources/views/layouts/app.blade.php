<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tinnova')</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: sans-serif;
            background-color: #333;
            margin: 0;
            padding-top: 70px; /* Adiciona espaço para a navbar fixa */
        }
        .navbar {
            border-bottom: 3px solid #00b4d8;
        }
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-link:hover {
            color: #00b4d8 !important;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            right: 0;
            height: 2px;
            background: #00b4d8;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-code-slash"></i>
                Tinnova Challenge
            </a>
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" 
                           href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('eleicao') ? 'active' : '' }}" 
                           href="/eleicao">Eleição</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('bubble') ? 'active' : '' }}" 
                           href="/bubble">Bubble Sort</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('fatorial') ? 'active' : '' }}" 
                           href="/fatorial">Fatorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('somamultiplos') ? 'active' : '' }}" 
                           href="/somamultiplos">Soma Múltiplos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('veiculos') ? 'active' : '' }}" 
                           href="/veiculos">Veículos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>