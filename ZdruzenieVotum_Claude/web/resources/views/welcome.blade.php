<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - {{ __('Supporting People with Disabilities') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --font-size-base: 16px;
        }

        html {
            font-size: var(--font-size-base);
        }

        .font-size-small {
            --font-size-base: 14px;
        }

        .font-size-normal {
            --font-size-base: 16px;
        }

        .font-size-large {
            --font-size-base: 18px;
        }

        *:focus-visible {
            outline: 3px solid #60a5fa;
            outline-offset: 2px;
        }

        .skip-link {
            position: absolute;
            top: -40px;
            left: 0;
            background: #1e40af;
            color: white;
            padding: 8px;
            z-index: 100;
        }

        .skip-link:focus {
            top: 0;
        }

        /* Mobile menu animation */
        .mobile-menu {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .mobile-menu.hidden {
            transform: translateX(100%);
            opacity: 0;
        }

        .mobile-menu.show {
            transform: translateX(0);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-blue-50 to-white">
<a href="#main-content" class="skip-link">{{ __('Skip to main content') }}</a>

@include('components.header')

<main id="main-content">
    @include('components.hero')
    @include('components.events')
    @include('components.activities')
    @include('components.team')
</main>

@include('components.footer')

@include('components.scripts')
</body>
</html>
