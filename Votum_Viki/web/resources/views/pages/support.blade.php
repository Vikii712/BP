<main class="container mx-auto px-4 py-16">

    <!-- Page Title -->
    <h1 class="text-5xl md:text-6xl font-bold text-votum-blue text-center mb-6">
        Ako nás podporiť?
    </h1>

    <p class="text-center text-gray-700 text-lg mb-16 max-w-2xl mx-auto">
        Vaša podpora nám pomáha zlepšovať životy ľudí so zdravotným znevýhodnením. Vyberte si spôsob, ktorý vám vyhovuje.
    </p>

    <!-- Support Options -->
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mb-16">

        <!-- Option 1: 2% Tax Donation -->
        <div class="support-card bg-gradient-to-br from-blue-50 to-blue-100 rounded-3xl shadow-xl p-8 text-center">
            <div class="bg-white rounded-full w-40 h-40 mx-auto mb-6 flex items-center justify-center shadow-lg">
                <div class="icon-pulse">
                    <div class="text-7xl font-bold text-votum-blue">2%</div>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-votum-blue mb-4">Venujte nám 2%</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Venujte nám 2% z vašich daní. Je to jednoduché a nič vás to nestojí. Pomôžete nám pokračovať v našej činnosti.
            </p>
            <a href="{{ url('/two_percent') }}" class="inline-block bg-votum-blue text-white px-8 py-4 rounded-full font-bold text-lg hover-scale shadow-lg">
                Viac informácií
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <!-- Option 2: Financial Support -->
        <div class="support-card bg-gradient-to-br from-green-50 to-green-100 rounded-3xl shadow-xl p-8 text-center">
            <div class="bg-white rounded-full w-40 h-40 mx-auto mb-6 flex items-center justify-center shadow-lg">
                <div class="icon-pulse">
                    <i class="fas fa-hand-holding-usd text-7xl text-green-600"></i>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-votum-blue mb-4">Finančná podpora</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Prispejte ľubovoľnou sumou priamo na náš účet. Každý príspevok sa počítá a pomáha nám realizovať naše projekty.
            </p>
            <a href="{{ url('/financial') }}" class="inline-block bg-green-600 text-white px-8 py-4 rounded-full font-bold text-lg hover-scale shadow-lg">
                Prispieť teraz
                <i class="fas fa-heart ml-2"></i>
            </a>
        </div>

        <!-- Option 3: Other Forms of Support -->
        <div class="support-card bg-gradient-to-br from-purple-50 to-purple-100 rounded-3xl shadow-xl p-8 text-center">
            <div class="bg-white rounded-full w-40 h-40 mx-auto mb-6 flex items-center justify-center shadow-lg">
                <div class="icon-pulse">
                    <i class="fas fa-hands-helping text-7xl text-purple-600"></i>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-votum-blue mb-4">Iné formy pomoci</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Staňte sa dobrovoľníkom, venujte nám materiál alebo svoj čas. Existuje mnoho spôsobov, ako nám môžete pomôcť.
            </p>
            <a href="{{ url('/other_support') }}" class="inline-block bg-purple-600 text-white px-8 py-4 rounded-full font-bold text-lg hover-scale shadow-lg">
                Kontaktujte nás
                <i class="fas fa-envelope ml-2"></i>
            </a>
        </div>

    </div>

    <!-- Additional Info Section -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 mb-16">
        <h3 class="text-2xl font-bold text-votum-blue mb-4 text-center">
            <i class="fas fa-info-circle mr-2"></i>
            Prečo je vaša podpora dôležitá?
        </h3>
        <div class="grid md:grid-cols-3 gap-6 text-center">
            <div class="p-4">
                <div class="text-4xl mb-3">🎯</div>
                <h4 class="font-bold text-votum-blue mb-2">Vzdelávanie</h4>
                <p class="text-gray-600 text-sm">Organizujeme vzdelávacie kurzy a workshopy</p>
            </div>
            <div class="p-4">
                <div class="text-4xl mb-3">🏕️</div>
                <h4 class="font-bold text-votum-blue mb-2">Aktivity</h4>
                <p class="text-gray-600 text-sm">Umožňujeme tábory, výlety a kultúrne podujatia</p>
            </div>
            <div class="p-4">
                <div class="text-4xl mb-3">💼</div>
                <h4 class="font-bold text-votum-blue mb-2">Integrácia</h4>
                <p class="text-gray-600 text-sm">Pomáhame pri hľadaní práce a začlenení do spoločnosti</p>
            </div>
        </div>
    </div>

    <!-- Home Button -->
    <div class="text-center">
        <a href="index.html" class="inline-flex items-center gap-3 bg-votum-blue text-white px-8 py-4 rounded-lg hover-scale font-semibold text-lg shadow-lg">
            <i class="fas fa-home text-2xl"></i>
            <span>Späť na hlavnú stránku</span>
        </a>
    </div>

</main>
