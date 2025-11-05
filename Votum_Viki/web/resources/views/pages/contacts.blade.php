<main class="container mx-auto px-4 py-12">
    <!-- Page Title -->
    <h1 class="text-4xl md:text-5xl font-bold text-votum-blue text-center mb-4">
        Kontakt
    </h1>

    <!-- Call to Action -->
    <div class="text-center mb-12">
        <p class="text-2xl text-votum-blue font-semibold bg-white inline-block px-8 py-3 rounded-full shadow-lg">
            Ozvite sa nám!
        </p>
    </div>

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8">

        <!-- Left Column -->
        <div class="space-y-6">

            <!-- Phone Contact -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="bg-votum-blue text-white p-4 rounded-full">
                        <i class="fas fa-phone text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-3">Telefónne číslo</h3>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                                <span class="font-semibold">0827 654 329</span>
                                <button onclick="copyToClipboard('0827654329')" class="copy-btn text-gray-600" title="Kopírovať">
                                    <i class="fas fa-copy text-lg"></i>
                                </button>
                            </div>
                            <div class="flex gap-2">
                                <a href="tel:0827654329" class="flex-1 bg-votum-blue text-white py-2 px-4 rounded text-center hover-scale">
                                    <i class="fas fa-phone mr-2"></i>Volať
                                </a>
                                <a href="sms:0827654329" class="flex-1 bg-green-600 text-white py-2 px-4 rounded text-center hover-scale">
                                    <i class="fas fa-sms mr-2"></i>SMS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-votum-blue mb-4">Adresa</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Sídlo:</p>
                        <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                            <span class="font-semibold">Hlavná 123, 811 01 Bratislava</span>
                            <button onclick="copyToClipboard('Hlavná 123, 811 01 Bratislava')" class="copy-btn text-gray-600" title="Kopírovať">
                                <i class="fas fa-copy text-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Prevádzka:</p>
                        <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                            <span class="font-semibold">Komunitná 45, 811 05 Bratislava</span>
                            <button onclick="copyToClipboard('Komunitná 45, 811 05 Bratislava')" class="copy-btn text-gray-600" title="Kopírovať">
                                <i class="fas fa-copy text-lg"></i>
                            </button>
                        </div>
                    </div>
                    <a href="#" class="flex items-center justify-center gap-2 bg-votum-blue text-white py-3 px-4 rounded hover-scale mt-3">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                        <span>Zobraziť na mape</span>
                    </a>
                </div>
            </div>

            <!-- Identification Data -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="bg-votum-blue text-white p-4 rounded-full">
                        <i class="fas fa-id-card text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-4">Identifikačné údaje</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">IČO:</p>
                                <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                                    <span class="font-semibold">12 345 678</span>
                                    <button onclick="copyToClipboard('12345678')" class="copy-btn text-gray-600" title="Kopírovať">
                                        <i class="fas fa-copy text-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">DIČ:</p>
                                <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                                    <span class="font-semibold">2023456789</span>
                                    <button onclick="copyToClipboard('2023456789')" class="copy-btn text-gray-600" title="Kopírovať">
                                        <i class="fas fa-copy text-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="space-y-6">

            <!-- Email Contact -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="bg-votum-blue text-white p-4 rounded-full">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-4">Mailové spojenie</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Združenie VOTUM:</p>
                                <div class="bg-votum-cream p-3 rounded mb-2">
                                    <span class="font-semibold break-all">zdruzenie.votum@gmail.com</span>
                                </div>
                                <button onclick="window.location.href='mailto:zdruzenie.votum@gmail.com'" class="w-full bg-votum-blue text-white py-2 px-4 rounded hover-scale">
                                    <i class="fas fa-paper-plane mr-2"></i>Napísať
                                </button>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Admin:</p>
                                <div class="bg-votum-cream p-3 rounded mb-2">
                                    <span class="font-semibold break-all">admin@zdruzenie.votum.sk</span>
                                </div>
                                <button onclick="window.location.href='mailto:admin@zdruzenie.votum.sk'" class="w-full bg-votum-blue text-white py-2 px-4 rounded hover-scale">
                                    <i class="fas fa-paper-plane mr-2"></i>Napísať
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banking Information -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="bg-votum-blue text-white p-4 rounded-full">
                        <i class="fas fa-university text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-votum-blue mb-4">Bankové údaje</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Číslo účtu:</p>
                                <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                                    <span class="font-semibold">SK31 1200 0000 1987 6543 2100</span>
                                    <button onclick="copyToClipboard('SK3112000000198765432100')" class="copy-btn text-gray-600" title="Kopírovať">
                                        <i class="fas fa-copy text-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">IBAN:</p>
                                <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                                    <span class="font-semibold">SK31 1200 0000 1987 6543 2100</span>
                                    <button onclick="copyToClipboard('SK3112000000198765432100')" class="copy-btn text-gray-600" title="Kopírovať">
                                        <i class="fas fa-copy text-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">SWIFT:</p>
                                <div class="flex items-center justify-between bg-votum-cream p-3 rounded">
                                    <span class="font-semibold">SUBASKBXXXX</span>
                                    <button onclick="copyToClipboard('SUBASKBXXXX')" class="copy-btn text-gray-600" title="Kopírovať">
                                        <i class="fas fa-copy text-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Home Button -->
    <div class="text-center mt-16 mb-8">
        <a href="index.html" class="inline-flex items-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
            <i class="fas fa-home text-2xl"></i>
            <span>Späť na hlavnú stránku</span>
        </a>
    </div>
</main>
