    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - {{ __('Supporting People with Disabilities') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'votum-blue': '#051647',
                        'blue2':'#3C6F9F',
                        'votum-cream': '#f1ebe3',
                        'votum-accent': '#ff6b6b',
                        'votum-accent-light': '#93bfdc',
                    }
                }
            }
        }
    </script>
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
            outline: 3px solid #ffd93d;
            outline-offset: 2px;
        }

        .skip-link {
            position: absolute;
            top: -40px;
            left: 0;
            background: #051647;
            color: white;
            padding: 8px;
            z-index: 100;
        }

        .skip-link:focus {
            top: 0;
        }

        /* Mobile menu animation */
        .mobile-menu {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }

        .mobile-menu.show {
            max-height: calc(100vh - 80px);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-votum-cream">
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
