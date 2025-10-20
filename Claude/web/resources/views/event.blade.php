<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - Turistika Slavín</title>
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

        .listening {
            animation: pulse 1.5s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .image-gallery img {
            cursor: pointer;
            transition: all 0.3s;
        }
        .image-gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
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
                    <a href="index.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-home text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Domov</span>
                    </a>
                </li>
                <li role="none">
                    <a href="about.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
                        <i class="fas fa-users text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">O nás</span>
                    </a>
                </li>
                <li role="none">
                    <a href="events.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition opacity-100 bg-white bg-opacity-10 px-4 py-2 rounded-lg" role="menuitem">
                        <i class="fas fa-calendar-alt text-2xl" aria-hidden="true"></i>
                        <span class="text-sm">Udalosti</span>
                    </a>
                </li>
                <li role="none">
                    <a href="history.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                    <a href="contact.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                        <a href="index.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-home text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Domov</span>
                        </a>
                    </li>
                    <li>
                        <a href="about.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-users text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">O nás</span>
                        </a>
                    </li>
                    <li>
                        <a href="events.html" class="flex items-center gap-4 py-3 px-4 bg-white bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
                            <i class="fas fa-calendar-alt text-xl w-6" aria-hidden="true"></i>
                            <span class="text-base">Udalosti</span>
                        </a>
                    </li>
                    <li>
                        <a href="history.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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
                        <a href="contact.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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

<!-- Main Content -->
<main class="container mx-auto px-4 py-12">

    <!-- Event Header -->
    <div class="max-w-5xl mx-auto mb-8">
        <!-- Date and Action Buttons -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            <div class="text-2xl font-bold text-votum-blue">
                <i class="fas fa-calendar-alt mr-2"></i>
                28. 6. 2024
            </div>
            <div class="flex gap-3">
                <button onclick="toggleListen()" id="listenBtn" class="bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold flex items-center gap-2">
                    <i class="fas fa-volume-up text-lg"></i>
                    <span>Vypočuť si</span>
                </button>
                <button onclick="shareEvent()" class="bg-green-600 text-white px-5 py-2 rounded-lg hover-scale font-semibold flex items-center gap-2">
                    <i class="fas fa-share-alt text-lg"></i>
                    <span>Zdieľať</span>
                </button>
            </div>
        </div>

        <!-- Event Title -->
        <h1 class="text-4xl md:text-5xl font-bold text-votum-blue mb-4">
            Turistika Slavín
        </h1>

        <!-- Sponsors/Partners -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-8">
            <div class="flex items-center gap-4 flex-wrap">
                <span class="text-gray-600 font-semibold">Sponzori:</span>
                <div class="flex items-center gap-4">
                    <span class="text-votum-blue font-bold text-lg">SPP</span>
                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                        <img src="{{asset('images/logo-partner.png')}}" alt="Partner logo" class="max-w-full max-h-full object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Description Section -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-votum-blue mb-6">O udalosti</h2>
            <div class="prose max-w-none text-gray-700 leading-relaxed space-y-4">
                <p>
                    V júni 2024 sme sa vydali na nezabudnuteľnú turistiku k pamätníku Slavín v Bratislave. Táto akcia bola skvelou príležitosťou na spoločné trávenie času v prírode a spoznávanie historických pamiatok nášho hlavného města.
                </p>
                <p>
                    Začali sme ráno stretnutím pri Prezidentskom paláci, odkiaľ sme sa pomaly vybrali cestou cez Horský park smerom k pamätníku. Počasie nám prialo a atmosféra bola plná optimizmu a dobrej nálady. Počas cesty sme sa zastavovali na viacerých miestach, kde sme obdivovali výhľady na mesto a vzájomne sa podporovali pri stúpaní.
                </p>
                <p>
                    Na Slavíne sme strávili príjemné chvíle, fotili sa, oddychovali a vychutnávali si výhľad na celú Bratislavu. Niektorí účastníci navštívili aj samotný pamätník a dozvedeli sa viac o jeho histórii a význame. Po spoločnom obede sme sa vydali späť do centra, unavení, ale šťastní zo spoločne stráveného dňa.
                </p>
                <p>
                    Táto aktivita ukázala, že spoločné zážitky v prírode sú skvelým spôsobom, ako posilniť priateľstvá a vytvoriť si nové spomienky. Ďakujeme všetkým účastníkom za ich účasť a pozitívnu energiu!
                </p>
            </div>
        </div>
    </section>

    <!-- Photos Section -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-votum-blue mb-6">Fotky z udalosti</h2>

            <!-- Image Gallery with Navigation -->
            <div class="relative">
                <div class="overflow-hidden rounded-lg mb-4">
                    <img id="mainImage" src="{{asset('images/event-slavin1.jpg')}}" alt="Turistika Slavín - Hlavná fotka" class="w-full h-96 object-cover">
                </div>

                <!-- Navigation Arrows -->
                <button onclick="previousImage()" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-votum-blue p-3 rounded-full shadow-lg hover-scale">
                    <i class="fas fa-chevron-left text-xl"></i>
                </button>
                <button onclick="nextImage()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-votum-blue p-3 rounded-full shadow-lg hover-scale">
                    <i class="fas fa-chevron-right text-xl"></i>
                </button>

                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-3 mt-4 image-gallery">
                    <img onclick="changeImage(0)" src="{{asset('images/event-slavin1.jpg')}}" alt="Foto 1" class="w-full h-24 object-cover rounded border-2 border-votum-blue cursor-pointer">
                    <img onclick="changeImage(1)" src="{{asset('images/event-slavin2.jpg')}}" alt="Foto 2" class="w-full h-24 object-cover rounded border-2 border-transparent cursor-pointer">
                    <img onclick="changeImage(2)" src="{{asset('images/event-slavin3.jpg')}}" alt="Foto 3" class="w-full h-24 object-cover rounded border-2 border-transparent cursor-pointer">
                    <img onclick="changeImage(3)" src="{{asset('images/event-slavin4.jpg')}}" alt="Foto 4" class="w-full h-24 object-cover rounded border-2 border-transparent cursor-pointer">
                </div>
            </div>
        </div>
    </section>

    <!-- Videos Section -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-votum-blue mb-6">Pozrite si video</h2>

            <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden flex items-center justify-center">
                <!-- Video Player Placeholder -->
                <div class="text-center">
                    <button class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white rounded-full p-6 hover-scale">
                        <i class="fas fa-play text-4xl"></i>
                    </button>
                    <p class="text-white mt-4">Video z turistiky na Slavín</p>
                </div>
                <!-- In real implementation, you would use:
                <video controls class="w-full h-full">
                    <source src="{{asset('videos/event-slavin.mp4')}}" type="video/mp4">
                </video>
                -->
            </div>
        </div>
    </section>

    <!-- Documents Section -->
    <section class="max-w-5xl mx-auto mb-12">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-votum-blue mb-6">Dokumenty na stiahnutie</h2>

            <div class="space-y-3">
                <!-- Document 1 -->
                <div class="flex items-center justify-between bg-votum-cream p-4 rounded-lg hover:shadow-md transition">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-pdf text-red-600 text-2xl"></i>
                        <span class="font-semibold text-votum-blue">Program turistiky - Slavín 2024.pdf</span>
                    </div>
                    <a href="#" download class="bg-votum-blue text-white px-4 py-2 rounded hover-scale flex items-center gap-2">
                        <i class="fas fa-download"></i>
                        <span>Stiahnuť</span>
                    </a>
                </div>

                <!-- Document 2 -->
                <div class="flex items-center justify-between bg-votum-cream p-4 rounded-lg hover:shadow-md transition">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-pdf text-red-600 text-2xl"></i>
                        <span class="font-semibold text-votum-blue">Zoznam účastníkov.pdf</span>
                    </div>
                    <a href="#" download class="bg-votum-blue text-white px-4 py-2 rounded hover-scale flex items-center gap-2">
                        <i class="fas fa-download"></i>
                        <span>Stiahnuť</span>
                    </a>
                </div>

                <!-- Document 3 -->
                <div class="flex items-center justify-between bg-votum-cream p-4 rounded-lg hover:shadow-md transition">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-image text-blue-600 text-2xl"></i>
                        <span class="font-semibold text-votum-blue">Fotogaléria - všetky fotky.zip</span>
                    </div>
                    <a href="#" download class="bg-votum-blue text-white px-4 py-2 rounded hover-scale flex items-center gap-2">
                        <i class="fas fa-download"></i>
                        <span>Stiahnuť</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Buttons -->
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="events.html" class="inline-flex items-center justify-center gap-3 bg-gray-600 text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                <i class="fas fa-calendar-alt text-2xl"></i>
                <span>Udalosti</span>
            </a>
            <a href="index.html" class="inline-flex items-center justify-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
                <i class="fas fa-home text-2xl"></i>
                <span>Domov</span>
            </a>
        </div>

        <!-- Scroll to Top Button -->
        <div class="text-center mt-8">
            <button onclick="scrollToTop()" class="bg-white text-votum-blue p-4 rounded-full shadow-lg hover-scale">
                <i class="fas fa-arrow-up text-2xl"></i>
            </button>
        </div>
    </div>

</main>
<!-- Footer -->
<footer class="bg-votum-blue text-white py-10">
    <div class="container mx-auto px-4">
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
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <div>
                <h4 class="text-xl font-bold mb-4">Navigácia</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <a href="index.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-home mr-2"></i>Domov
                        </a>
                        <a href="about.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-users mr-2"></i>O nás
                        </a>
                        <a href="events.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-calendar-alt mr-2"></i>Udalosti
                        </a>
                        <a href="history.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-clock mr-2"></i>História
                        </a>
                    </div>
                    <div class="space-y-2">
                        <a href="#support" class="block hover:opacity-80 transition">
                            <i class="fas fa-hand-holding-heart mr-2"></i>Podpora
                        </a>
                        <a href="contact.html" class="block hover:opacity-80 transition">
                            <i class="fas fa-envelope mr-2"></i>Kontakty
                        </a>
                        <a href="#documents" class="block hover:opacity-80 transition">
                            <i class="fas fa-file-alt mr-2"></i>Dokumenty
                        </a>
                    </div>
                </div>
            </div>
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
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.closest('.lang-btn').classList.add('active');
        console.log('Language changed to:', lang);
    }

    // Year Filter Function
    function filterByYear(year) {
        // Update active button
        document.querySelectorAll('.year-filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');

        // Filter events
        const eventSections = document.querySelectorAll('[data-year]');

        if (year === 'all') {
            eventSections.forEach(section => {
                section.style.display = 'block';
            });
        } else {
            eventSections.forEach(section => {
                if (section.getAttribute('data-year') === year) {
                    section.style.display = 'block';
                    // Smooth scroll to the year section
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    section.style.display = 'none';
                }
            });
        }
    }

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
