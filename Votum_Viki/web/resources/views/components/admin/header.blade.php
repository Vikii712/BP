<header class="bg-blue-950 shadow-xl fixed w-full z-100">
    <div class="container mx-auto px-4 sm:px-2 py-4 flex items-center justify-between">

        <a href="{{ route('admin') }}" class="flex items-center gap-3"
           title="Otvoriť administrátorský panel VOTUM">
            <!-- Veľké settings koliesko -->
            <i class="fas fa-cog text-indigo-200 text-3xl lg:text-4xl"></i>

            <!-- Text vedľa ikony -->
            <span class=" text-2xl lg:text-3xl font-bold logo-font tracking-wide">
                <span class="text-indigo-200">VOTUM admin</span>
            </span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-white rounded-full flex items-center justify-center
                           hover:shadow-2xl hover:scale-110 transition-all duration-300"
                    aria-label="Odhlásiť sa z administrátorského panelu">
                <i class="fas fa-power-off text-blue-950 text-lg sm:text-xl lg:text-2xl"></i>
            </button>
        </form>

    </div>
</header>


<button
    onclick="history.back()"
    class="fixed border-2 border-blue-950 top-24 lg:top-28 left-4 bg-white rounded-full w-12 h-12 flex items-center justify-center
           hover:bg-blue-50 z-50 cursor-pointer"
    aria-label="Späť"
    title="Späť">
    <i class="fas fa-arrow-left text-blue-950 text-xl"></i>
</button>

<!-- VOTUM main -->
<a href="{{ route('main') }}" target="_blank"
   class="fixed top-24 lg:top-28 left-17 bg-blue-950 rounded-full w-12 h-12 flex items-center justify-center
          z-50 cursor-pointer"
   aria-label="VOTUM main page"
   title="Otvoriť stránku Združenie VOTUM v novom okne">
    <img src="{{ asset('images/logo.svg') }}" alt="VOTUM logo" class="w-8 h-8 p-1 mb-1">
</a>

