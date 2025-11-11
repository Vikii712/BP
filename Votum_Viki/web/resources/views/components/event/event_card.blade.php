@props(['color' => true])

<div class=" {{$color ? 'bg-event' : 'bg-white' }} rounded-lg overflow-hidden sm:mx-5 shadow-lg border-3 border-event">
    <!-- Obrázok -->
    <div class="h-64 overflow-hidden m-5 mb-0">
        <img src="{{ asset('images/activity1.jpg') }}" alt="Tábor 2024" class="w-full h-full object-cover">
    </div>

    <!-- Obsah v grid kontejnery -->
    <div class="pt-3 p-6 grid">
        <h3 class="text-2xl font-bold text-votum-blue mb-2 ">Tábor 2024</h3>

        <p class="text-votum-blue text-bold mb-2 text-lg ">Nezabudnuteľné leto plné zábavy, priateľstva a dobrodružstva.</p>

        <a href="{{ route('event') }}" class="text-lg bg-votum-blue text-white px-7 py-4 rounded hover-scale justify-self-end">
            Viac <i class="pl-2 fas fa-arrow-right"></i>
        </a>
    </div>
</div>
