<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biološka putovnica</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
<nav class="bg-blue-600 p-4 text-white flex justify-between">
    <h1 class="text-lg font-bold">Biološka putovnica</h1>
    <div>
        <a href="{{ route('dashboard') }}" class="px-3 hover:underline">Naslovna</a>
        <a href="{{ route('dokumenti.index') }}" class="px-3 hover:underline">Dokumenti</a>
        <a href="{{ route('cijepljenja.index') }}" class="px-3 hover:underline">Cijepljenja</a>
        <a href="{{ route('pregledi.index') }}" class="px-3 hover:underline">Pregledi</a>
        <a href="{{ route('profili.index') }}" class="px-3 hover:underline">Profil</a>
    </div>
</nav>

<div class="container mx-auto p-6">
    @yield('content')
</div>
</body>
</html>
