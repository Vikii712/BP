<!doctype html>
<html lang="{{ session('locale', 'sk') }}" class="text-base">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM - @yield('title')</title>
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body class="bg-[var(--bg)]">
<x-header />

<main role="main" class="bg-[var(--cream)]">
    @yield('content')
</main>

<footer class="bg-white border-t mt-8 py-6">
    <div class="text-sm text-slate-600 flex flex-col md:flex-row md:justify-between">
        <div>© {{ date('Y') }} VOTUM. All rights reserved.</div>
        <div>Accessible, WCAG friendly</div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
