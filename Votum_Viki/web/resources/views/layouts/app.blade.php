<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM</title>
    @vite('resources/css/app.css')
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
