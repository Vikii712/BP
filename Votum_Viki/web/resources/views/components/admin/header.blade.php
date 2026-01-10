<header class="bg-blue-950 shadow-xl">
    <div class="container mx-auto px-4 sm:px-6 py-4">
        <!-- Desktop layout (lg+) -->
        <div class="hidden lg:grid lg:grid-cols-3 items-center gap-4">
            <!-- Logo a názov - vľavo -->
            <a class="flex items-center gap-3" href="{{route('admin')}}">
                <img class="p-2 pr-0 sm:pr-2" alt="logo" src="{{ asset('images/logo.svg') }}" width="70">
                <h1 class="text-white text-3xl font-bold logo-font tracking-wide">VOTUM<span class="text-indigo-300"> -admin</span></h1>
            </a>

            <!-- Email v strede -->
            <div class="flex justify-center">
                <div class="bg-white/10 backdrop-blur-sm px-6 py-2 rounded-full border border-white/20">
                    <p class="text-white text-xl">zdruzenievotum@gmail.com</p>
                </div>
            </div>

            <!-- Okrúhle tlačidlo odhlásenia - vpravo -->
            <div class="flex justify-end">
                <a href="#"
                   class="bg-white text-blue-950 px-6 py-2 rounded-full hover:shadow-2xl font-medium text-xl transition-all duration-300"
                   aria-label="Odhlásiť sa z administrátorského panelu">
                    <span>Odhlásiť sa</span>
                </a>
            </div>
        </div>

        <!-- Mobile layout -->
        <div class="lg:hidden space-y-3">
            <!-- Logo vycentrované -->
            <div class="flex justify-center">
                <a class="flex items-center gap-2" href="{{route('admin')}}">
                    <img class="p-1" alt="logo" src="{{ asset('images/logo.svg') }}" width="45">
                    <h1 class="text-white text-2xl font-bold logo-font tracking-wide">VOTUM<span class="text-indigo-300">-admin</span></h1>
                </a>
            </div>

            <!-- Email vycentrovaný -->
            <div class="flex justify-center">
                <div class="bg-white/10 backdrop-blur-sm px-4 py-1.5 rounded-full border border-white/20">
                    <p class="text-white text-xs sm:text-sm">zdruzenievotum@gmail.com</p>
                </div>
            </div>

            <!-- Tlačidlo vycentrované -->
            <div class="flex justify-center">
                <a href="#"
                   class="bg-white text-blue-950 px-6 py-2 rounded-full hover:shadow-2xl font-medium text-sm transition-all duration-300 inline-block"
                   aria-label="Odhlásiť sa z administrátorského panelu">
                    <span>Odhlásiť sa</span>
                </a>
            </div>
        </div>
    </div>
</header>
