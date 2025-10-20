<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTUM - Dokumenty na stiahnutie</title>
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

        .document-card {
            transition: all 0.3s ease;
        }
        .document-card:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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
                    <a href="events.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                    <a href="support.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition" role="menuitem">
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
                    <a href="documents.html" class="flex flex-col items-center gap-2 hover:opacity-80 transition opacity-100 bg-white bg-opacity-10 px-4 py-2 rounded-lg" role="menuitem">
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
                        <a href="events.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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
                        <a href="support.html" class="flex items-center gap-4 py-3 px-4 hover:bg-white hover:bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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
                        <a href="documents.html" class="flex items-center gap-4 py-3 px-4 bg-white bg-opacity-10 rounded-lg transition" onclick="toggleMobileMenu()">
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

    <!-- Page Title -->
    <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-4">
        Dokumenty na stiahnutie
    </h1>
    <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
        Tu nájdete všetky dôležité dokumenty súvisiace s naším združením - stanovy, výročné zprávy, GDPR dokumentáciu a ďalšie materiály.
    </p>

    <div class="max-w-5xl mx-auto space-y-12">

        <!-- GDPR Documents Section -->
        <section>
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-votum-blue mb-2">GDPR</h2>
                <div class="h-1 w-24 bg-votum-blue rounded"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Document 1 -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-red-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-red-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Dokument GDPR</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">1200 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Document 2 -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-red-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-red-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Dokument 2</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">2800 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 2% Tax Donation Documents Section -->
        <section>
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-votum-blue mb-2">2%</h2>
                <div class="h-1 w-24 bg-votum-blue rounded"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Document 3 -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-blue-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Dokument 3</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">DOC</span>
                                <span class="text-gray-500">502 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Document 4-5 -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-blue-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Dokument 4-5</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">1024 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Statutes and Reports Section -->
        <section>
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-votum-blue mb-2">Stanovy a výročné správy</h2>
                <div class="h-1 w-24 bg-votum-blue rounded"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Document -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-green-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Stanovy združenia VOTUM</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">850 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Document -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-green-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Výročná správa 2024</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">3200 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Document -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-green-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Výročná správa 2023</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">2950 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Registration Documents Section -->
        <section>
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-votum-blue mb-2">Registračné dokumenty</h2>
                <div class="h-1 w-24 bg-votum-blue rounded"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Document -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-purple-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-purple-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Osvedčenie o registrácii</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">620 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Document -->
                <div class="document-card bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-purple-100 p-4 rounded-lg flex-shrink-0">
                            <i class="fas fa-file-pdf text-purple-600 text-3xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-votum-blue mb-2">Výpis z registra</h3>
                            <p class="text-sm text-gray-600 mb-4">
                                <span class="inline-block bg-gray-100 px-2 py-1 rounded mr-2">PDF</span>
                                <span class="text-gray-500">450 KB</span>
                            </p>
                            <a href="#" download class="inline-flex items-center gap-2 bg-votum-blue text-white px-5 py-2 rounded-lg hover-scale font-semibold">
                                <i class="fas fa-download"></i>
                                <span>Stiahnuť</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

    <!-- Navigation Buttons -->
    <div class="max-w-5xl mx-auto mt-16">
        <div class="text-center">
            <a href="index.html" class="inline-flex items-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
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
                        <a href="support.html" class="block hover:opacity-80 transition">
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
