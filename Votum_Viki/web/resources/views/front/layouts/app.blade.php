<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM</title>
    @vite(['resources/css/app.css', 'resources/js/front/app.js'])
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="description" content="VOTUM je združenie s viac ako 30-ročnou tradíciou, ktoré vytvára komunitu založenú na podpore, porozumení a kresťanských hodnotách. Spájame mladých ľudí a prinášame radosť do života.">
</head>


<body data-locale="{{ app()->getLocale() ?? 'sk' }}">

<x-front::header />

<x-front::a11yMenu />


<main id="site-main" role="main" class="">
    <div class="filter-container">
        @yield('content')
    </div>
</main>


<x-front::footer />

</body>
</html>
