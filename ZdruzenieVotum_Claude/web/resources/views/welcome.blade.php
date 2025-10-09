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

        /* Focus visible styles for accessibility */
        *:focus-visible {
            outline: 3px solid #60a5fa;
            outline-offset: 2px;
        }

        /* Skip to main content link */
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
    </style>
</head>
<body class="bg-gradient-to-b from-blue-50 to-white">
<!-- Skip to main content link for accessibility -->
<a href="#main-content" class="skip-link">{{ __('Skip to main content') }}</a>

<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <!-- Top Header Bar -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo and Name -->
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-300 to-blue-400 rounded-full flex items-center justify-center" role="img" aria-label="{{ __('VOTUM Logo') }}">
                    <i class="fas fa-hands-helping text-white text-xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-blue-600">VOTUM</h1>
            </div>

            <!-- Accessibility Controls -->
            <div class="flex items-center space-x-4">
                <!-- Font Size Controls -->
                <div class="flex items-center space-x-2 bg-blue-50 rounded-lg p-2" role="group" aria-label="{{ __('Font size controls') }}">
                    <button onclick="decreaseFontSize()" class="px-3 py-1 bg-white rounded hover:bg-blue-100 transition-colors" aria-label="{{ __('Decrease font size') }}">
                        <i class="fas fa-minus text-sm"></i>
                    </button>
                    <span class="text-sm font-medium text-gray-700">{{ __('Font') }}</span>
                    <button onclick="increaseFontSize()" class="px-3 py-1 bg-white rounded hover:bg-blue-100 transition-colors" aria-label="{{ __('Increase font size') }}">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                </div>

                <!-- Language Switcher -->
                <div class="flex items-center space-x-2 bg-blue-50 rounded-lg p-2">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="language" value="sk" class="sr-only" {{ app()->getLocale() == 'sk' ? 'checked' : '' }} onchange="changeLanguage('sk')">
                        <span class="px-3 py-1 rounded transition-colors {{ app()->getLocale() == 'sk' ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-blue-100' }}">SK</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="language" value="en" class="sr-only" {{ app()->getLocale() == 'en' ? 'checked' : '' }} onchange="changeLanguage('en')">
                        <span class="px-3 py-1 rounded transition-colors {{ app()->getLocale() == 'en' ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-blue-100' }}">EN</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="border-t border-gray-200 bg-white" aria-label="{{ __('Main navigation') }}">
        <div class="container mx-auto px-4">
            <ul class="flex items-center justify-around py-4">
                <li><a href="#home" class="flex flex-col items-center space-y-2 text-gray-700 hover:text-blue-600 transition-colors group">
                        <i class="fas fa-home text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">{{ __('Home') }}</span>
                    </a></li>
                <li><a href="#about" class="flex flex-col items-center space-y-2 text-gray-700 hover:text-blue-600 transition-colors group">
                        <i class="fas fa-users text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">{{ __('About Us') }}</span>
                    </a></li>
                <li><a href="#events" class="flex flex-col items-center space-y-2 text-gray-700 hover:text-blue-600 transition-colors group">
                        <i class="fas fa-calendar-alt text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">{{ __('Events') }}</span>
                    </a></li>
                <li><a href="#history" class="flex flex-col items-center space-y-2 text-gray-700 hover:text-blue-600 transition-colors group">
                        <i class="fas fa-clock text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">{{ __('History') }}</span>
                    </a></li>
                <li><a href="#support" class="flex flex-col items-center space-y-2 text-gray-700 hover:text-blue-600 transition-colors group">
                        <i class="fas fa-hand-holding-heart text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">{{ __('Support') }}</span>
                    </a></li>
                <li><a href="#contact" class="flex flex-col items-center space-y-2 text-gray-700 hover:text-blue-600 transition-colors group">
                        <i class="fas fa-envelope text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">{{ __('Contact') }}</span>
                    </a></li>
                <li><a href="#documents" class="flex flex-col items-center space-y-2 text-gray-700 hover:text-blue-600 transition-colors group">
                        <i class="fas fa-file-alt text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium">{{ __('Documents') }}</span>
                    </a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- Main Content -->
<main id="main-content">
    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <!-- Hero Content -->
            <div class="space-y-6">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">
                    {{ __('Together we are stronger') }}
                </h2>
                <p class="text-xl text-gray-600">
                    {{ __('Supporting people with disabilities to live full and independent lives') }}
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4">
                    <a href="#about" class="inline-flex items-center px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors shadow-md">
                        <i class="fas fa-info-circle mr-2"></i>
                        {{ __('More About Us') }}
                    </a>
                    <a href="#" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md" aria-label="{{ __('Visit our Facebook page') }}">
                        <i class="fab fa-facebook-f mr-2"></i>
                        Facebook
                    </a>
                    <a href="#" class="inline-flex items-center px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors shadow-md" aria-label="{{ __('Visit our YouTube channel') }}">
                        <i class="fab fa-youtube mr-2"></i>
                        YouTube
                    </a>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="relative">
                <div class="aspect-video bg-gradient-to-br from-blue-200 to-purple-200 rounded-2xl shadow-xl overflow-hidden">
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-users text-8xl text-blue-400 opacity-50"></i>
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-yellow-300 rounded-full opacity-50"></div>
                <div class="absolute -top-4 -left-4 w-16 h-16 bg-pink-300 rounded-full opacity-50"></div>
            </div>
        </div>
    </section>

    <!-- What Awaits Us Section -->
    <section class="bg-blue-50 py-16" id="events">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">{{ __('What Awaits Us?') }}</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Calendar -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('August 2025') }}</h3>
                    <div class="grid grid-cols-7 gap-2 text-center">
                        <!-- Calendar Header -->
                        @foreach(['Po', 'Ut', 'St', 'Št', 'Pi', 'So', 'Ne'] as $day)
                            <div class="text-sm font-medium text-gray-600">{{ $day }}</div>
                        @endforeach

                        <!-- Calendar Days -->
                        @php
                            $calendarDays = [
                                ['', '', '', '', '1', '2', '3'],
                                ['4', '5', '6', '7', '8', '9', '10'],
                                ['11', '12', '13', '14', '15', '16', '17'],
                                ['18', '19', '20', '21', '22', '23', '24'],
                                ['25', '26', '27', '28', '29', '30', '31']
                            ];
                            $eventDays = [9, 20, 29];
                        @endphp

                        @foreach($calendarDays as $week)
                            @foreach($week as $day)
                                @if($day !== '')
                                    <div class="aspect-square flex items-center justify-center rounded-lg {{ in_array((int)$day, $eventDays) ? 'bg-blue-500 text-white font-bold' : 'bg-gray-50 text-gray-700' }} hover:bg-blue-200 transition-colors cursor-pointer">
                                        {{ $day }}
                                    </div>
                                @else
                                    <div></div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <button class="w-full mt-6 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        {{ __('Add to Your Calendar') }}
                    </button>
                </div>

                <!-- Event List -->
                <div class="space-y-4">
                    @php
                        $events = [
                            ['date' => '9.8.', 'name' => 'Koncert', 'sold_out' => true],
                            ['date' => '20.8.', 'name' => 'Vystúpenie', 'sold_out' => true],
                            ['date' => '29.8.', 'name' => 'Tábor', 'sold_out' => true]
                        ];
                    @endphp

                    @foreach($events as $event)
                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">{{ $event['date'] }}</p>
                                    <h4 class="text-xl font-semibold text-gray-800">{{ $event['name'] }}</h4>
                                </div>
                                @if($event['sold_out'])
                                    <span class="px-4 py-2 bg-red-100 text-red-600 rounded-lg text-sm font-medium">
                                            {{ __('Sold Out') }}
                                        </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Our Activities Section -->
    <section class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">{{ __('Our Activities') }}</h2>

        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <!-- Activity Card 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="aspect-video bg-gradient-to-br from-purple-200 to-pink-200 flex items-center justify-center">
                    <i class="fas fa-music text-6xl text-purple-400 opacity-50"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('Summer Camp 2024') }}</h3>
                    <p class="text-gray-600 mb-4">{{ __('Unforgettable experiences and new friendships') }}</p>
                    <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        {{ __('More') }}
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Activity Card 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="aspect-video bg-gradient-to-br from-green-200 to-blue-200 flex items-center justify-center">
                    <i class="fas fa-theater-masks text-6xl text-green-400 opacity-50"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('Concert 2025') }}</h3>
                    <p class="text-gray-600 mb-4">{{ __('Annual charity concert') }}</p>
                    <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        {{ __('More') }}
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="#events" class="inline-flex items-center px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors shadow-md text-lg font-medium">
                {{ __('See More Events') }}
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="bg-gradient-to-br from-blue-50 to-purple-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">{{ __('Our Team') }}</h2>

            <!-- Team Image -->
            <div class="max-w-4xl mx-auto mb-8">
                <div class="aspect-video bg-gradient-to-br from-blue-300 to-purple-300 rounded-2xl shadow-xl overflow-hidden">
                    <div class="w-full h-full flex items-center justify-center p-8">
                        <div class="grid grid-cols-3 gap-8">
                            @for($i = 0; $i < 3; $i++)
                                <div class="flex flex-col items-center">
                                    <div class="w-20 h-20 bg-white rounded-full mb-2 flex items-center justify-center">
                                        <i class="fas fa-user text-3xl text-blue-400"></i>
                                    </div>
                                    <div class="w-24 h-32 bg-white rounded-lg opacity-75"></div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="text-center text-gray-600 mt-4 text-sm">{{ __('Together we make a difference') }}</p>
            </div>

            <div class="text-center">
                <a href="#about" class="inline-flex items-center px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors shadow-md text-lg font-medium">
                    <i class="fas fa-users mr-2"></i>
                    {{ __('Learn More About Our Team') }}
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">VOTUM</h3>
                <p class="text-gray-300">{{ __('Supporting people with disabilities') }}</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">{{ __('Contact') }}</h4>
                <p class="text-gray-300">Email: info@votum.sk</p>
                <p class="text-gray-300">{{ __('Phone') }}: +421 123 456 789</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">{{ __('Follow Us') }}</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-2xl hover:text-blue-400 transition-colors" aria-label="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-2xl hover:text-red-400 transition-colors" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="text-2xl hover:text-blue-300 transition-colors" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 VOTUM. {{ __('All rights reserved') }}.</p>
        </div>
    </div>
</footer>

<script>
    // Font size control
    let currentSize = 1;
    function increaseFontSize() {
        if (currentSize < 2) {
            currentSize++;
            updateFontSize();
        }
    }

    function decreaseFontSize() {
        if (currentSize > 0) {
            currentSize--;
            updateFontSize();
        }
    }

    function updateFontSize() {
        const sizes = ['font-size-small', 'font-size-normal', 'font-size-large'];
        document.documentElement.className = sizes[currentSize];
    }

    // Language switcher
    function changeLanguage(lang) {
        window.location.href = '?lang=' + lang;
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
</body>
</html>
