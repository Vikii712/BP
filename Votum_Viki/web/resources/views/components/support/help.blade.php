<section class="max-w-5xl mx-auto mb-12" x-data="{ tab: 'fyzicke' }">
    <div class="bg-votum2 border-4 border-votum2 rounded-2xl p-10 text-votum-blue shadow-lg">


        <!-- Prepínacie tlačidlá -->
        <div class="flex justify-center gap-4 mb-10">
            <button
                @click="tab = 'fyzicke'"
                :class="tab === 'fyzicke'
                    ? 'bg-dark-votum2 text-white font-bold shadow'
                    : 'bg-white text-votum-blue border border-votum-blue font-semibold'"
                class="px-6 py-3 rounded-md transition-colors duration-200 hover:bg-votum-blue hover:text-votum-cream"
            >
                Fyzické osoby
            </button>

            <button
                @click="tab = 'pravnicke'"
                :class="tab === 'pravnicke'
                    ? 'bg-dark-votum2 text-white font-bold shadow'
                    : 'bg-white text-votum-blue border border-votum-blue font-semibold'"
                class="px-6 py-3 rounded-md transition-colors duration-200 hover:bg-votum-blue hover:text-votum-cream"
            >
                Právnické osoby
            </button>
        </div>

        <!-- Postup pre fyzické osoby -->
        <div x-show="tab === 'fyzicke'">
            <h3 class="text-2xl font-bold mb-6 flex items-center justify-center gap-3 text-votum-blue">
                <i class="fas fa-user text-3xl"></i>
                Postup pre fyzické osoby
            </h3>
            <p class="text-lg mb-8 text-center text-gray-800">
                Ak ste zamestnanec alebo podnikateľ a podávate daňové priznanie, postupujte nasledovne:
            </p>
            <ol class="border-3 border-votum2 list-decimal list-inside bg-white p-6 rounded-lg text-lg font-medium space-y-2 shadow-inner">
                <li>Postup</li>
                <li>Sprav toto potom</li>
                <li>Stiahni</li>
                <li>Vyplň</li>
                <li>Na záver toto</li>
            </ol>
        </div>

        <!-- Postup pre právnické osoby -->
        <div x-show="tab === 'pravnicke'">
            <h3 class="text-2xl font-bold mb-6 flex items-center justify-center gap-3 text-votum-blue">
                <i class="fas fa-building text-3xl"></i>
                Postup pre právnické osoby
            </h3>
            <p class="text-lg mb-8 text-center text-gray-800">
                Ak ste firma alebo organizácia a chcete podporiť naše združenie, postup je podobný ako pre fyzické osoby:
            </p>
            <ol class="border-3 border-votum2 list-decimal list-inside bg-white p-6 rounded-lg text-lg font-medium space-y-2 shadow-inner">
                <li>Postup</li>
                <li>Sprav toto potom</li>
                <li>Stiahni</li>
                <li>Sprav toto potom inak</li>
                <li>Este toto</li>
                <li>Vyplň</li>
                <li>Na záver toto</li>
            </ol>
        </div>
    </div>
</section>
