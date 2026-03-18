<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/open-dyslexic@1.0.3/open-dyslexic-regular.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:wght@400;700&display=swap" rel="stylesheet">
    <meta name="description" content="VOTUM je združenie s viac ako 30-ročnou tradíciou, ktoré vytvára komunitu založenú na podpore, porozumení a kresťanských hodnotách. Spájame mladých ľudí a prinášame radosť do života.">
    <meta http-equiv="Content-Security-Policy" content="frame-src https://www.youtube.com https://www.youtube-nocookie.com https://www.google.com https://maps.google.com;">
</head>


<body>

<x-header />

<main id="site-main" role="main" class="">
    <div class="filter-container">
        @yield('content')
    </div>
</main>

<x-a11yMenu />

<x-footer />

@stack('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
