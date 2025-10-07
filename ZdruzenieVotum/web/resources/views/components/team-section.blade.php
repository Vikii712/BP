<section id="team" class="relative mt-16 px-10  pb-24 bg-[var(--cream)]">
    <!-- Bubble container -->
    <div class="relative bg-blue-950 text-[var(--cream)] rounded-[2rem] shadow-lg overflow-hidden max-w-6xl mx-auto">
        <!-- Decorative overlay like in hero -->
        <div class="absolute inset-0 bg-blue-900/40"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col items-center text-center py-12 px-6 md:px-12">
            <h3 class="text-3xl md:text-4xl font-bold mb-6">Náš tím</h3>

            <!-- Team image -->
            <div class="w-full max-w-4xl mb-8">
                <img src="{{ asset($image) }}" alt="{{ $alt }}"
                     class="w-full h-64 md:h-96 object-cover rounded-2xl shadow-md border border-blue-800/50">
            </div>

            <!-- Learn more button -->
            <a href="#team-members"
               class="inline-block bg-blue-300 text-blue-950 font-semibold text-lg px-6 py-3 rounded-full shadow hover:bg-blue-400 transition">
                Viac o našom tíme
            </a>
        </div>
    </div>
</section>
