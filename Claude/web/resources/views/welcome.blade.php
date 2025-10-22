<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - Podpora ľudí so zdravotným znevýhodnením</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --font-size-base: 16px;
        }
        body {
            font-size: var(--font-size-base);
        }
        .bg-votum-blue { background-color: #051647; }
        .bg-votum-blue-light { background-color: #0a2558; }
        .text-votum-blue { color: #051647; }
        .bg-votum-cream { background-color: #f1ebe3; }
        .hover-scale { transition: transform 0.2s; }
        .hover-scale:hover { transform: scale(1.05); }
        .calendar-day { aspect-ratio: 1; }
        .event-day { background-color: #fbbf24; font-weight: bold; }

        /* Mobile Menu Styles */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out;
        }
        .mobile-menu.active {
            max-height: 600px;
        }

        /* Modern Button Styles */
        .font-control-btn {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.2s;
        }
        .font-control-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }
        .lang-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.2s;
        }
        .lang-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .lang-btn.active {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="bg-votum-cream">
<!-- Header -->
<header class="bg-votum-blue text-white">
    <!-- Top Bar -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo and Name -->
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-hands-helping text-votum-blue text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold">VOTUM</h1>
            </div>

            <!-- Desktop: Accessibility Controls -->
            <div class="hidden md:flex items-center gap-4">
                <div class="flex items-center gap-2" role="group" aria-label="Veľkosť písma">
                    <span class="text-sm font-medium">Písmo</span>
                    <button onclick="decreaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zmenšiť písmo">
                        <i class="fas fa-minus text-sm"></i>
                    </button>
                    <button onclick="increaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zväčšiť písmo">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                </div>
                <div class="flex gap-2">
                    <button onclick="changeLanguage('sk')" class="lang-btn active text-white px-4 py-2 rounded-lg font-medium" aria-label="Slovenčina">
                        🇸🇰 SK
                    </button>
                    <button onclick="changeLanguage('en')" class="lang-btn text-white px-4 py-2 rounded-lg font-medium" aria-label="English">
                        🇬🇧 EN
                    </button>
                </div>
            </div>

            <!-- Mobile: Hamburger Menu Button -->
            <button onclick="toggleMobileMenu()" class="md:hidden text-white p-2" aria-label="Menu" aria-expanded="false" id="menuButton">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Desktop Navigation -->
    <!-- Desktop Navigation -->
    <nav class="bg-votum-blue-light border-t border-blue-400 hidden md:block">
        <div class="container mx-auto px-4">
            <ul class="flex justify-around py-4" role="menubar">
                <li role="none">
                    <a href="{{ url('/') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-home text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Domov</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/about') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-users text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">O nás</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/events') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-calendar-alt text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Udalosti</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/history') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-clock text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">História</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/support') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-hand-holding-heart text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Podpora</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/contacts') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-envelope text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Kontakty</span>
                    </a>
                </li>
                <li role="none">
                    <a href="{{ url('/documents') }}" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-file-alt text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Dokumenty</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="mobile-menu bg-votum-blue-light md:hidden">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-blue-400">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium">Písmo</span>
                    <button onclick="decreaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zmenšiť písmo">
                        <i class="fas fa-minus text-sm"></i>
                    </button>
                    <button onclick="increaseFontSize()" class="font-control-btn text-white px-3 py-2 rounded-lg" aria-label="Zväčšiť písmo">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                </div>
                <div class="flex gap-2">
                    <button onclick="changeLanguage('sk')" class="lang-btn active text-white px-4 py-2 rounded-lg font-medium text-sm" aria-label="Slovenčina">
                        🇸🇰 SK
                    </button>
                    <button onclick="changeLanguage('en')" class="lang-btn text-white px-4 py-2 rounded-lg font-medium text-sm" aria-label="English">
                        🇬🇧 EN
                    </button>
                </div>
            </div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ url('/') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-home text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Domov</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-users text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">O nás</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/events') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-calendar-alt text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Udalosti</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/history') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-clock text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">História</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/support') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-hand-holding-heart text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Podpora</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contacts') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-envelope text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Kontakty</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/documents') }}" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-file-alt text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Dokumenty</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="container mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-8 items-center">
        <!-- Left: Content -->
        <div>
            <h2 class="text-4xl md:text-5xl font-bold text-votum-blue mb-6">
                Spolu je život veselší!
            </h2>
            <p class="text-lg text-gray-700 mb-8">
                Podporujeme ľudí so zdravotným znevýhodnením v ich každodennom živote a pomáhame im dosiahnuť ich ciele.
            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <button class="bg-votum-blue text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fas fa-info-circle mr-2"></i>Viac o nás
                </button>
                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fab fa-facebook-f mr-2"></i>Facebook
                </button>
                <button class="bg-red-600 text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fab fa-youtube mr-2"></i>YouTube
                </button>
            </div>
        </div>

        <!-- Right: Hero Image -->
        <div class="rounded-lg overflow-hidden shadow-lg">
            <img src="{{asset('images/group.jpg')}}" alt="Skupina mladých ľudí" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="bg-white py-12" id="events">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">Čo nás čaká?</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Calendar -->
            <div>
                <h3 class="text-xl font-bold text-votum-blue mb-4">August 2025</h3>
                <div class="bg-votum-cream rounded-lg p-4">
                    <div class="grid grid-cols-7 gap-2 mb-4">
                        <div class="text-center font-bold text-sm">Po</div>
                        <div class="text-center font-bold text-sm">Ut</div>
                        <div class="text-center font-bold text-sm">St</div>
                        <div class="text-center font-bold text-sm">Št</div>
                        <div class="text-center font-bold text-sm">Pi</div>
                        <div class="text-center font-bold text-sm">So</div>
                        <div class="text-center font-bold text-sm">Ne</div>
                    </div>
                    <div class="grid grid-cols-7 gap-2">
                        <div class="calendar-day"></div>
                        <div class="calendar-day"></div>
                        <div class="calendar-day"></div>
                        <div class="calendar-day"></div>
                        <div class="calendar-day text-center p-2 bg-white rounded">1</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">2</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">3</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">4</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">5</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">6</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">7</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">8</div>
                        <div class="calendar-day text-center p-2 bg-white rounded event-day">9</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">10</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">11</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">12</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">13</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">14</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">15</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">16</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">17</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">18</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">19</div>
                        <div class="calendar-day text-center p-2 bg-white rounded event-day">20</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">21</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">22</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">23</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">24</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">25</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">26</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">27</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">28</div>
                        <div class="calendar-day text-center p-2 bg-white rounded event-day">29</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">30</div>
                        <div class="calendar-day text-center p-2 bg-white rounded">31</div>
                    </div>
                </div>
                <button class="mt-4 w-full bg-votum-blue text-white py-2 rounded-lg hover-scale">
                    <i class="fas fa-calendar-plus mr-2"></i>Uložiť do môjho kalendára
                </button>
            </div>

            <!-- Events List -->
            <div>
                <h3 class="text-xl font-bold text-votum-blue mb-4">Nadchádzajúce udalosti</h3>
                <div class="space-y-4">
                    <div class="bg-votum-cream p-4 rounded-lg flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-votum-blue">9.8. Koncert</h4>
                            <p class="text-sm text-gray-600">Letný hudobný večer</p>
                        </div>
                        <button class="bg-white px-4 py-2 rounded hover-scale text-votum-blue font-semibold">
                            Ísť ďalej
                        </button>
                    </div>
                    <div class="bg-votum-cream p-4 rounded-lg flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-votum-blue">20.8. Výšľapenie</h4>
                            <p class="text-sm text-gray-600">Turistika v Malej Fatre</p>
                        </div>
                        <button class="bg-white px-4 py-2 rounded hover-scale text-votum-blue font-semibold">
                            Ísť ďalej
                        </button>
                    </div>
                    <div class="bg-votum-cream p-4 rounded-lg flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-votum-blue">29.8. Tábor</h4>
                            <p class="text-sm text-gray-600">Letný detský tábor</p>
                        </div>
                        <button class="bg-white px-4 py-2 rounded hover-scale text-votum-blue font-semibold">
                            Ísť ďalej
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Activities Section -->
<section class="bg-votum-cream py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">Naše Aktivity</h2>

        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <!-- Activity Card 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover-scale">
                <div class="h-64 overflow-hidden">
                    <img src="{{asset('images/activity1.jpg')}}" alt="Tábor 2024" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-votum-blue mb-2">Tábor 2024</h3>
                    <p class="text-gray-700 mb-4">Nezabudnuteľné leto plné zábavy, priateľstva a dobrodružstva.</p>
                    <button class="bg-votum-blue text-white px-6 py-2 rounded hover-scale">
                        Viac
                    </button>
                </div>
            </div>

            <!-- Activity Card 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover-scale">
                <div class="h-64 overflow-hidden">
                    <img src="{{asset('images/activity2.jpg')}}" alt="Koncert 2025" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-votum-blue mb-2">Koncert 2025</h3>
                    <p class="text-gray-700 mb-4">Hudobný večer s našimi talentovanými členmi a priateľmi.</p>
                    <button class="bg-votum-blue text-white px-6 py-2 rounded hover-scale">
                        Viac
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="bg-votum-blue text-white px-8 py-3 rounded-lg hover-scale font-semibold text-lg">
                <i class="fas fa-arrow-right mr-2"></i>Chcete vidieť viac?
            </button>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-white py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">Náš tím</h2>

        <div class="max-w-4xl mx-auto">
            <div class="rounded-lg overflow-hidden shadow-lg mb-8">
                <img src="{{asset('images/team.jpg')}}" alt="Náš tím" class="w-full h-auto object-cover">
            </div>

            <div class="text-center">
                <button class="bg-votum-blue text-white px-8 py-3 rounded-lg hover-scale font-semibold text-lg">
                    <i class="fas fa-users mr-2"></i>Spoznať členov nášho tímu
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-votum-blue text-white py-10">
    <div class="container mx-auto px-4">
        <!-- Top Section: Organization Name and Social Media -->
        <div class="text-center mb-8 pb-8 border-b border-blue-400">
            <h3 class="text-3xl font-bold mb-4">VOTUM</h3>
            <div class="flex justify-center gap-6">
                <a href="#" class="flex items-center gap-2 hover:opacity-80 transition" aria-label="Facebook">
                    <i class="fab fa-facebook text-3xl"></i>
                    <span class="text-lg">Facebook</span>
                </a>
                <a href="#" class="flex items-center gap-2 hover:opacity-80 transition" aria-label="YouTube">
                    <i class="fab fa-youtube text-3xl"></i>
                    <span class="text-lg">YouTube</span>
                </a>
            </div>
        </div>

        <!-- Bottom Section: Navigation Links and Contact Info -->
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <!-- Left Half: Navigation Links in Two Columns -->
            <div>
                <h4 class="text-xl font-bold mb-4">Navigácia</h4>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Left Column -->
                    <div class="space-y-2">
                        <a href="#home" class="block hover:opacity-80 transition">
                            <i class="fas fa-home mr-2"></i>Domov
                        </a>
                        <a href="#about" class="block hover:opacity-80 transition">
                            <i class="fas fa-users mr-2"></i>O nás
                        </a>
                        <a href="#events" class="block hover:opacity-80 transition">
                            <i class="fas fa-calendar-alt mr-2"></i>Udalosti
                        </a>
                        <a href="#history" class="block hover:opacity-80 transition">
                            <i class="fas fa-clock mr-2"></i>História
                        </a>
                    </div>
                    <!-- Right Column -->
                    <div class="space-y-2">
                        <a href="#support" class="block hover:opacity-80 transition">
                            <i class="fas fa-hand-holding-heart mr-2"></i>Podpora
                        </a>
                        <a href="#contact" class="block hover:opacity-80 transition">
                            <i class="fas fa-envelope mr-2"></i>Kontakty
                        </a>
                        <a href="#documents" class="block hover:opacity-80 transition">
                            <i class="fas fa-file-alt mr-2"></i>Dokumenty
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Half: Contact and Accessibility -->
            <div>
                <h4 class="text-xl font-bold mb-4">Našli ste chybu?</h4>
                <div class="space-y-3">
                    <p class="text-sm">
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:admin@zdravieznevyhodnenie.sk" class="hover:opacity-80 transition underline">
                            admin@zdravieznevyhodnenie.sk
                        </a>
                    </p>
                    <div class="mt-4">
                        <a href="#" class="inline-block hover:opacity-80 transition underline text-sm">
                            <i class="fas fa-universal-access mr-2"></i>
                            Vyhlásenie o prístupnosti
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-blue-400 pt-6 text-center text-sm">
            <p>&copy; 2025 VOTUM. Všetky práva vyhradené.</p>
        </div>
    </div>
</footer>

<script>
    // Mobile Menu Toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const button = document.getElementById('menuButton');
        const icon = button.querySelector('i');

        menu.classList.toggle('active');
        const isExpanded = menu.classList.contains('active');
        button.setAttribute('aria-expanded', isExpanded);

        // Toggle icon between bars and times
        if (isExpanded) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    }

    // Font Size Control
    let fontSize = 16;
    function increaseFontSize() {
        if (fontSize < 24) {
            fontSize += 2;
            document.documentElement.style.setProperty('--font-size-base', fontSize + 'px');
        }
    }
    function decreaseFontSize() {
        if (fontSize > 12) {
            fontSize -= 2;
            document.documentElement.style.setProperty('--font-size-base', fontSize + 'px');
        }
    }

    // Language Toggle
    function changeLanguage(lang) {
        // Toggle active state on buttons
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.closest('.lang-btn').classList.add('active');

        console.log('Language changed to:', lang);
        // In Laravel, this would redirect to a route with locale parameter
        // window.location.href = '/locale/' + lang;
    }

    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('mobileMenu');
        const button = document.getElementById('menuButton');

        if (menu.classList.contains('active') &&
            !menu.contains(event.target) &&
            !button.contains(event.target)) {
            toggleMobileMenu();
        }
    });
</script>
</body>
</html>
