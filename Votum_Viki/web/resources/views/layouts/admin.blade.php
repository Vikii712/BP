<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>VOTUM ADMIN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta http-equiv="Content-Security-Policy" content="frame-src https://www.youtube.com https://www.youtube-nocookie.com https://www.google.com https://maps.google.com;">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @yield('head')
</head>


<body>

<x-admin.header />

<main id="site-main" role="main" class="pt-22">
    @yield('adminContent')
</main>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@stack('scripts')

</body>
</html>
