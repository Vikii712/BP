<header class="bg-blue-950 shadow-xl fixed w-full z-100">
    <div class="container mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">

        <!-- Logo + názov -->
        <a href="{{ route('admin') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="p-1 w-12 lg:w-[70px]">
            <h1 class="text-white text-2xl lg:text-3xl font-bold logo-font tracking-wide">
                VOTUM<span class="text-indigo-300">-admin</span>
            </h1>
        </a>

        <!-- Logout -->
        <a href="#"
           class="w-12 h-12 lg:w-14 lg:h-14 bg-white rounded-full flex items-center justify-center
                  hover:shadow-2xl hover:scale-110 transition-all duration-300"
           aria-label="Odhlásiť sa z administrátorského panelu">
            <i class="fas fa-power-off text-blue-950 text-xl lg:text-2xl"></i>
        </a>

    </div>
</header>
