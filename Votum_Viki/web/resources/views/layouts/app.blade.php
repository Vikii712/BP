<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
</head>


<body>

<x-header />

<main role="main" class="bg-[var(--cream)]">
    @yield('content')
</main>

<x-footer />

@stack('scripts')
</body>
</html>
