@props(['hero', 'image'])

<div class="relative">

    <!-- Hero Section -->
    <div class="bg-blue-50 relative">
        <section class="container mx-auto px-4 py-12 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Left: Content -->
                <div>
                    <div class="flex relative -mr-3">
                        <x-listen :text="$hero->title . $hero->content" :down="true" />
                        <h1 class="h1 md:text-5xl font-bold text-votum-blue mb-6 mr-15 text-center lg:text-left min-h-[4.5rem]">
                            {{ $hero->title }}
                        </h1>
                    </div>

                    <p class="txt text-gray-700 mb-10 text-center lg:text-left leading-relaxed min-h-[6rem]">
                        {{ $hero->content }}
                    </p>

                    <div class="pt-12 sm:pt-0 relative flex flex-col items-center lg:items-start gap-6">

                        <div class="absolute pointer-events-none opacity-100 z-0
                                    -top-12 right-5 w-28 h-28
                                    sm:-top-13 sm:-right-0 sm:w-40 sm:h-40
                                    md:w-50  md:h-50
                                    lg:-top-15 lg:right-0">
                            <img src="{{ asset('images/votumaci.png') }}" alt=""
                                 class="w-full h-full object-contain">
                        </div>

                        <!-- 1. button hore – Viac o nás -->
                        <a href="{{ route('about') }}"
                           class="w-full sm:w-auto relative z-10 flex items-center justify-center gap-3 bg-dark-votum2 text-white px-10 py-5 rounded-xl txt-btn font-semibold shadow-md hover:bg-votum-blue/90 focus:ring-4 focus:ring-blue-300 focus:outline-none transition">
                            <i class="fas fa-user-group text-2xl"></i>
                            <span>{{ __('nav.aboutUs') }}</span>
                        </a>

                        <!-- 2. Facebook a YouTube pod sebou -->
                        <div class="w-full sm:w-auto flex flex-col sm:flex-row gap-6 relative z-10">
                            <a href="https://www.facebook.com/100064455204496" target="_blank"
                               class="w-full sm:w-auto txt-btn flex items-center justify-center gap-3 bg-dark-votum1 text-white px-10 py-5 rounded-xl font-semibold shadow-md focus:ring-4 focus:ring-blue-300 focus:outline-none transition">
                                <i class="fab fa-facebook text-3xl"></i>
                                <span>Facebook</span>
                            </a>

                            <a href="https://www.youtube.com/@zdruzenievotum641" target="_blank"
                               class="w-full sm:w-auto txt-btn flex items-center justify-center gap-3 bg-dark-votum3 text-white px-10 py-5 rounded-xl font-semibold shadow-md focus:ring-4 focus:ring-blue-30 focus:outline-none transition">
                                <i class="fab fa-youtube text-3xl"></i>
                                <span>YouTube</span>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Right: Image -->
                <div class="relative">
                    <div class="rounded-2xl overflow-hidden shadow-xl aspect-[8/5] w-full">
                        <img
                            src="{{ asset('storage/' . $image->url) }}"
                            alt="{{ $image->alt }}"
                            loading="eager"
                            fetchpriority="high"
                            width="800"
                            height="500"
                            class="w-full h-full object-cover"
                        >
                    </div>
                </div>

            </div>
        </section>
    </div>

    <x-wave :inverted="true" :light="true"/>
</div>
