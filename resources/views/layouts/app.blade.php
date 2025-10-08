<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Biološka putovnica</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Biološka putovnica</a>
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item"><a class="nav-link" href="{{ route('profili.index') }}">Profili</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cijepljenja.index') }}">Cijepljenja</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pregledi.index') }}">Pregledi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dokumenti.index') }}">Dokumenti</a></li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Odjava</button>
                    </form>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Prijava</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registracija</a></li>
            @endauth
        </ul>
    </div>
</nav>

<main class="container">
    @yield('content')
</main>
</body>
</html>
