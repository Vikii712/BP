@extends('layouts.app')

@section('content')
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

@endsection

