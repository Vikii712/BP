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
            transition: max-height 0.3s ease-in-out;
        }
        .mobile-menu.active {
            max-height: 100vh;
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
    <nav class="bg-votum-blue-light border-t border-blue-400 hidden md:block">
        <div class="container mx-auto px-4">
            <ul class="flex justify-around py-4" role="menubar">
                <li role="none">
                    <a href="#home" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-home text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Domov</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#about" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-users text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">O nás</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#events" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-calendar-alt text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Udalosti</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#history" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-clock text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">História</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#support" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-hand-holding-heart text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Podpora</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#contact" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-envelope text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Kontakty</span>
                    </a>
                </li>
                <li role="none">
                    <a href="#documents" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
            <!-- Font Size and Language Controls -->
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

            <!-- Navigation Links -->
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="#home" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-home text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Domov</span>
                        </a>
                    </li>
                    <li>
                        <a href="#about" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-users text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">O nás</span>
                        </a>
                    </li>
                    <li>
                        <a href="#events" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-calendar-alt text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Udalosti</span>
                        </a>
                    </li>
                    <li>
                        <a href="#history" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-clock text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">História</span>
                        </a>
                    </li>
                    <li>
                        <a href="#support" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-hand-holding-heart text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Podpora</span>
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-envelope text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Kontakty</span>
                        </a>
                    </li>
                    <li>
                        <a href="#documents" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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

        <!-- Right: Image Placeholder -->
        <div class="bg-gray-300 rounded-lg aspect-video flex items-center justify-center">
            <div class="text-center text-gray-600">
                <i class="fas fa-users text-6xl mb-4"></i>
                <p class="text-xl">Fotka skupiny mladých ľudí</p>
            </div>
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
                <div class="bg-gray-300 h-64 flex items-center justify-center">
                    <i class="fas fa-campground text-6xl text-gray-500"></i>
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
                <div class="bg-gray-300 h-64 flex items-center justify-center">
                    <i class="fas fa-music text-6xl text-gray-500"></i>
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
            <div class="bg-gray-300 rounded-lg h-96 flex items-center justify-center mb-8">
                <div class="text-center text-gray-600">
                    <i class="fas fa-user-friends text-8xl mb-4"></i>
                    <p class="text-2xl">Fotka nášho tímu</p>
                </div>
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
<footer class="bg-votum-blue text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8 mb-6">
            <div>
                <h3 class="text-xl font-bold mb-4">VOTUM</h3>
                <p class="text-sm">Podporujeme ľudí so zdravotným znevýhodnením a pomáhame im žiť plnohodnotný život.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Kontakt</h3>
                <p class="text-sm mb-2"><i class="fas fa-envelope mr-2"></i>info@votum.sk</p>
                <p class="text-sm mb-2"><i class="fas fa-phone mr-2"></i>+421 XXX XXX XXX</p>
                <p class="text-sm"><i class="fas fa-map-marker-alt mr-2"></i>Bratislava, Slovensko</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Sledujte nás</h3>
                <div class="flex gap-4">
                    <a href="#" class="text-2xl hover:opacity-80" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:opacity-80" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-2xl hover:opacity-80" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-blue-400 pt-6 text-center text-sm">
            <p>&copy; 2025 VOTUM. Všetky práva vyhradené.</p>
        </div>
    </div>
</footer>

<script>
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
</script>
</body>
</html>
