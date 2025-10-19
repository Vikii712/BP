@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen py-10">
        <div class="max-w-5xl mx-auto px-6">

            @php
                // Mock event data
                $event = [
                    'title' => 'Turistika na Slavín',
                    'date' => '28.6.2024',
                    'description' => 'V rámci nášho programu sa uskutočnila turistika na Slavín.
                        Zúčastnilo sa mnoho členov a dobrovoľníkov, ktorí si deň užili v priateľskej atmosfére.
                        Počasie nám prialo a program bol plný smiechu, rozhovorov a priateľských hier.',
                    'images' => [
                        asset('images/event1.jpg'),
                        asset('images/event2.jpg'),
                        asset('images/event3.jpg'),
                    ],
                    'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                    'document_name' => 'Správa z podujatia.pdf',
                    'document_path' => '#',
                ];
            @endphp

            {{-- Title and Date --}}
            <h1 class="text-3xl md:text-4xl font-bold mb-2 text-center">{{ $event['title'] }}</h1>
            <p class="text-center text-lg mb-6">{{ $event['date'] }}</p>

            {{-- Top buttons --}}
            <div class="flex justify-center gap-4 mb-10">
                <button
                    class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                    🔊 Vypočuť si
                </button>
                <button
                    class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                    🔗 Zdieľať
                </button>
            </div>

            {{-- Event description --}}
            <section class="bg-white shadow-md rounded-2xl p-6 mb-10">
                <h2 class="text-2xl font-semibold mb-4">O udalosti</h2>
                <p class="leading-relaxed">{{ $event['description'] }}</p>
            </section>

            {{-- Photo carousel --}}
            <section class="bg-white shadow-md rounded-2xl p-6 mb-10">
                <h2 class="text-2xl font-semibold mb-4">Fotky z udalosti</h2>
                <div x-data="{ current: 0, images: {{ json_encode($event['images']) }} }" class="relative">
                    <img :src="images[current]" alt="Fotka z udalosti"
                         class="w-full h-80 object-cover rounded-xl transition-all duration-500">

                    {{-- Arrows --}}
                    <button @click="current = (current - 1 + images.length) % images.length"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-[#051647] text-white px-3 py-2 rounded-r-xl hover:bg-blue-900 transition">
                        ←
                    </button>
                    <button @click="current = (current + 1) % images.length"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#051647] text-white px-3 py-2 rounded-l-xl hover:bg-blue-900 transition">
                        →
                    </button>
                </div>
            </section>

            {{-- Video section --}}
            <section class="bg-white shadow-md rounded-2xl p-6 mb-10">
                <h2 class="text-2xl font-semibold mb-4">Pozrite si video</h2>
                <div class="aspect-video">
                    <iframe src="{{ $event['video_url'] }}"
                            title="Video z udalosti"
                            class="w-full h-full rounded-xl"
                            allowfullscreen></iframe>
                </div>
            </section>

            {{-- Document download --}}
            <section class="bg-white shadow-md rounded-2xl p-6 mb-10">
                <h2 class="text-2xl font-semibold mb-4">Dokument na stiahnutie</h2>
                <div class="flex items-center justify-between border rounded-xl px-4 py-3 bg-[#f9f9f9]">
                    <span>{{ $event['document_name'] }}</span>
                    <a href="{{ $event['document_path'] }}"
                       class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                        Stiahnuť ⬇️
                    </a>
                </div>
            </section>

            {{-- Bottom navigation --}}
            <div class="flex justify-center gap-6 mt-10">
                <a href="{{ route('events') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                    📅 Udalosti
                </a>
                <a href="{{ route('home') }}"
                   class="flex items-center gap-2 bg-[#051647] text-white px-4 py-2 rounded-xl hover:bg-blue-900 transition">
                    🏠 Domov
                </a>
            </div>

            {{-- Scroll to top --}}
            <button id="scrollTopBtn"
                    class="fixed bottom-6 right-6 bg-[#051647] text-white p-3 rounded-full shadow-lg hover:bg-blue-900 transition">
                ↑
            </button>
        </div>
    </main>

    {{-- Alpine.js for carousel + Scroll button --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.getElementById('scrollTopBtn').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
@endsection
