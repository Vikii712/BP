<!-- Hero Section -->
<section class="container mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-8 items-center">
        <!-- Left: Content -->
        <div>
            <h2 class="text-4xl md:text-5xl font-bold text-votum-blue mb-6">
                Spolu je život veselší!
            </h2>
            <p class="text-lg text-gray-700 mb-8">
                VOTUM je komunita mladých ľudí so zdravotným znevýhodnením. Pomáhame si napĺňať sny, rozvíjať sa a žiť zmysluplný život. Podporujeme samostatnosť a dávame priestor na sebarealizáciu.            </p>
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="{{route('main')}}" class="flex items-center justify-center bg-votum-blue text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fas fa-user-group mr-2 text-xl"></i>Viac o nás
                </a>
                <a href="https://www.facebook.com/100064455204496" target="_blank" class="flex items-center justify-center bg-blue-600 text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fab fa-facebook mr-2 text-2xl"></i>Facebook
                </a>
                <a href="https://www.youtube.com/@zdruzenievotum641" target="_blank" class="flex items-center justify-center bg-red-600 text-white px-6 py-3 rounded-lg hover-scale font-semibold">
                    <i class="fab fa-youtube mr-2 text-2xl"></i>YouTube
                </a>
            </div>
        </div>

        <!-- Right: Hero Image -->
        <div class="rounded-lg overflow-hidden shadow-lg">
            <img src="{{asset('images/group.jpg')}}" alt="Skupina mladých ľudí" class="w-full h-full object-cover">
        </div>
    </div>
</section>
