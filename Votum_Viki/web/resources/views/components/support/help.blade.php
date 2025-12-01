@props(['how'])

@php
    $fyzicke = $how
        ->whereIn('title', ['Fyzická osoba', 'Natural person'])
        ->first();

    $pravnicke = $how
        ->whereIn('title', ['Právnická osoba', 'Legal person'])
        ->first();
@endphp

<section class="max-w-5xl mx-auto mb-12" x-data="{ tab: 'fyzicke' }">
    <div class="bg-votum2 border-4 border-votum2 rounded-2xl p-5 sm:p-10 text-votum-blue shadow-lg">

        <!-- TABS -->
        <div class="txt flex flex-wrap justify-center gap-4 mb-10">
            <button
                @click="tab = 'fyzicke'"
                :class="tab === 'fyzicke'
                    ? 'bg-dark-votum2 text-white font-bold shadow'
                    : 'bg-white text-votum-blue border border-votum-blue font-semibold'"
                class="px-6 py-3 rounded-md transition-colors duration-200 txt-btn"
            >
                {{ __('nav.fyz') }}
            </button>

            <button
                @click="tab = 'pravnicke'"
                :class="tab === 'pravnicke'
                    ? 'bg-dark-votum2 text-white font-bold shadow'
                    : 'bg-white text-votum-blue border border-votum-blue font-semibold'"
                class="px-6 py-3 rounded-md transition-colors duration-200 txt-btn"
            >
                {{ __('nav.prav') }}
            </button>
        </div>


        <div x-show="tab === 'fyzicke'">
            <h3 class="h3 font-bold mb-6 flex items-center justify-center gap-3 text-votum-blue">
                <i class="fas fa-user text-3xl"></i>
                {{ __('nav.fyzHelp') }}
            </h3>
            <div class="border-3 border-votum2 bg-white p-6 rounded-lg txt font-medium shadow-inner">
                <div class="prose prose-lg list-decimal list-inside space-y-3">
                    {!! $fyzicke['content'] ?? '' !!}
                </div>
            </div>
        </div>

        <div x-show="tab === 'pravnicke'">
            <h3 class="h3 font-bold mb-6 flex items-center justify-center gap-3 text-votum-blue">
                <i class="fas fa-building text-3xl"></i>
                {{ __('nav.pravHelp') }}
            </h3>
            <div class="border-3 border-votum2 bg-white p-6 rounded-lg txt font-medium shadow-inner">
                <div class="prose prose-lg list-decimal list-inside space-y-3">
                    {!! $pravnicke['content'] ?? '' !!}
                </div>
            </div>
        </div>

    </div>
</section>
