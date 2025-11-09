<!-- Hero Section -->
<section class="container mx-auto px-4 py-12">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
        <!-- Left: Content -->
        <div>
            <h2 class="text-4xl md:text-5xl font-bold text-votum-blue mb-6 text-center lg:text-left">
                Spolu je život veselší!
            </h2>
            <p class="text-lg text-gray-700 mb-10 text-center lg:text-left leading-relaxed">
                VOTUM je komunita mladých ľudí so zdravotným znevýhodnením. Pomáhame si napĺňať sny, rozvíjať sa a žiť zmysluplný život.
                Podporujeme samostatnosť a dávame priestor na sebarealizáciu.
            </p>

            <!-- Accessible Button Group -->
            <div class="flex flex-col sm:flex-row sm:flex-wrap gap-6 justify-center lg:justify-start">
                <a href="https://www.facebook.com/100064455204496" target="_blank"
                   class="flex items-center justify-center gap-3 bg-blue-600 text-white px-10 py-5 rounded-xl text-xl font-semibold shadow-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition">
                    <i class="fab fa-facebook text-3xl"></i>
                    <span>Facebook</span>
                </a>

                <a href="https://www.youtube.com/@zdruzenievotum641" target="_blank"
                   class="flex items-center justify-center gap-3 bg-red-600 text-white px-10 py-5 rounded-xl text-xl font-semibold shadow-md hover:bg-red-700 focus:ring-4 focus:ring-red-300 focus:outline-none transition">
                    <i class="fab fa-youtube text-3xl"></i>
                    <span>YouTube</span>
                </a>

                <a href="{{ route('about') }}"
                   class="flex items-center justify-center gap-3 bg-votum-blue text-white px-10 py-5 rounded-xl text-xl font-semibold shadow-md hover:bg-votum-blue/90 focus:ring-4 focus:ring-blue-300 focus:outline-none transition">
                    <i class="fas fa-user-group text-2xl"></i>
                    <span>Viac o nás</span>
                </a>
            </div>
        </div>

        <!-- Right: Hero Image -->
        <div class="rounded-2xl overflow-hidden shadow-xl">
            <img src="{{ asset('images/group.jpg') }}" alt="Skupina mladých ľudí" class="w-full h-full object-cover">
        </div>
    </div>
</section>
