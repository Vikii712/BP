<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="description" content="VOTUM je združenie s viac ako 30-ročnou tradíciou, ktoré vytvára komunitu založenú na podpore, porozumení a kresťanských hodnotách. Spájame mladých ľudí a prinášame radosť do života.">
    <meta http-equiv="Content-Security-Policy" content="frame-src https://www.youtube.com https://www.youtube-nocookie.com https://www.google.com https://maps.google.com;">
</head>


<body>

<x-header />

<x-a11yMenu />


<main id="site-main" role="main" class="">
    <div class="filter-container">
        @yield('content')
    </div>
</main>


<x-footer />

@stack('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
<script>
    window.appLocale = "{{ app()->getLocale() }}";
</script>
</body>
</html>
