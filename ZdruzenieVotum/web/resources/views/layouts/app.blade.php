<!doctype html>
<html lang="{{ session('locale', 'sk') }}" class="text-base">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[var(--bg)]">
<x-header />

<main role="main" class="container py-8">
    @yield('content')
</main>

<footer class="bg-white border-t mt-8 py-6">
    <div class="container text-sm text-slate-600 flex flex-col md:flex-row md:justify-between">
        <div>© {{ date('Y') }} VOTUM. All rights reserved.</div>
        <div>Accessible, WCAG friendly</div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
