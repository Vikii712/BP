@php
    $locale = app()->getLocale();
@endphp

    <!-- Footer -->
<footer class="bg-votum-blue text-white pt-5 filter-container">
    <div class="">
        <!-- Top Section: Organization Name and Social Media -->
        <div class="text-center mb-8 pt-5 bg-blue-950">
            <h3 class="text-3xl font-bold mb-4">Združenie VOTUM</h3>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="#" class="py-5 txt-btn-block flex text-blue-300 items-center gap-2" aria-label="Facebook">
                    <i class="fab fa-facebook text-3xl"></i>
                    <span class="text-lg">Facebook</span>
                </a>
                <a href="#" class="py-5 txt-btn-block flex items-center gap-2 text-red-300" aria-label="YouTube">
                    <i class="fab fa-youtube text-3xl"></i>
                    <span class="text-lg">YouTube</span>
                </a>
            </div>
        </div>

        <!-- Bottom Section: Navigation Links and Contact Info -->
        <div class="grid lg:grid-cols-2 gap-8 px-4 md:px-7 w-full">
            <div class="w-full">
                <h4 class="text-2xl font-bold mb-4 text-blue-300">{{ __('nav.nav') }}</h4>
                <div class="grid sm:grid-cols-2 text-lg w-full text-center lg:text-left">
                    <div class="w-full">
                        <a href="{{ route('main', ['locale' => $locale]) }}" class="py-5 txt-btn-block block w-full">
                            <x-front::ikony.home class="w-7 mr-2" />
                            {{ __('nav.home') }}
                        </a>
                        <a href="{{ route('about', ['locale' => $locale]) }}" class="py-5 txt-btn-block block w-full">
                            <x-front::ikony.about class="w-7 mr-2" />
                            {{ __('nav.about') }}
                        </a>
                        <a href="{{ route('events', ['locale' => $locale]) }}" class="py-5 txt-btn-block block w-full">
                            <x-front::ikony.event class="w-7 mr-2" />
                            {{ __('nav.events') }}
                        </a>
                        <a href="{{ route('history', ['locale' => $locale]) }}" class="py-5 txt-btn-block block w-full">
                            <x-front::ikony.history class="w-7 mr-2" />
                            {{ __('nav.history') }}
                        </a>
                    </div>

                    <div class="w-full">
                        <a href="{{ route('support', ['locale' => $locale]) }}" class="py-5 txt-btn-block block w-full">
                            <x-front::ikony.support class="w-7 mr-2" />
                            {{ __('nav.support') }}
                        </a>
                        <a href="{{ route('contacts', ['locale' => $locale]) }}" class="py-5 txt-btn-block block w-full">
                            <x-front::ikony.contact class="w-7 mr-2" />
                            {{ __('nav.contacts') }}
                        </a>
                        <a href="{{ route('documents', ['locale' => $locale]) }}" class="py-5 txt-btn-block block w-full">
                            <x-front::ikony.document class="w-7 mr-2" />
                            {{ __('nav.documents') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Half: Contact and Accessibility -->
            <div class="w-full">
                <h4 class="text-2xl font-bold mb-4 text-blue-300">{{ __('nav.err') }}</h4>
                <div class="space-y-3 w-full text-center lg:text-right">
                    <p class="text-sm w-full">
                        <a href="mailto:zdruzenie.votum@gmail.com" class="py-5 txt-btn-block inline-block text-lg underline w-full">
                            <x-front::ikony.contact class="w-7 mr-2" />
                            zdruzenie.votum@gmail.com
                        </a>
                    </p>
                    <div class="mt-4 w-full">
                        <a href="{{ route('a11y', ['locale' => $locale]) }}" class="py-5 txt-btn-block inline-block underline text-lg w-full">
                            <i class="fas fa-universal-access mr-2"></i>
                            {{ __('nav.acc') }}
                        </a>
                    </div>
                    <p class="my-4 text-neutral-300 text-center">
                        &copy;
                        2026{{ now()->year > 2026 ? ' - ' . now()->year : '' }}
                        Združenie VOTUM, všetky práva vyhradené
                        <br> Web: Viktória Latičová
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
