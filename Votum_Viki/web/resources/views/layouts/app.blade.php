<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&display=swap" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="frame-src https://www.youtube.com https://www.youtube-nocookie.com https://www.google.com https://maps.google.com;">
</head>


<body>

<x-header />

<main id="site-main" role="main" class="">
    @yield('content')
</main>

<x-footer />

@stack('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
