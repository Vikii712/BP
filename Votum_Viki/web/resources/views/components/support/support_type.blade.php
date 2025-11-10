@props(['type'])

<div class="border-b md:border-0 flex flex-col sm:flex-row md:flex-col items-center justify-center sm:justify-between md:p-4 md:mb-5 text-center sm:space-y-0 space-y-6">
    <div class="p-3 rounded-lg bg-votum-cream h-40 w-40 flex items-center justify-center mb-4 sm:mb-0 sm:ml-3 md:mb-5">
        <img
            src="{{ asset('images/' . ($type == 'p' ? 'percent' : ($type == 'f' ? 'money' : 'other')) . '.svg') }}"
            alt=""
            class="object-contain h-full w-full"
        >
    </div>

    <a href="{{ $type == 'p' ? route('2percent') : ($type == 'f' ? route('financial') : route('other')) }}"
       class="text-white sm:ml-4 md:mt-5 inline-flex items-center gap-2 bg-votum-blue px-6 py-3 rounded-full font-semibold text-xl shadow-md transition-all duration-200 hover:bg-votum-blue/90 hover:scale-105 active:scale-95">
        {{ $type == 'p' ? 'Venujte 2%' : ($type == 'f' ? 'Finančná podpora' : 'Iné formy podpory') }}
        <i class="fas fa-arrow-right text-sm"></i>
    </a>
</div>
