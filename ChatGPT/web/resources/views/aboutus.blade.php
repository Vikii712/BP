@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] text-[#051647] min-h-screen">
        <section class="max-w-6xl mx-auto px-6 py-12 space-y-12">

            {{-- HEADER SECTION WITH BUTTONS --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4 md:mb-0">O nás</h1>
                <div class="flex gap-3">
                    <button class="bg-[#051647] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-900 transition" onclick="speakText()">
                        🔊 Vypočuť si
                    </button>
                    <button onclick="sharePage()" class="border border-[#051647] px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-[#051647] hover:text-white transition">
                        🔗 Zdieľať
                    </button>
                </div>
            </div>

            {{-- OUR VISION --}}
            <section class="flex flex-col md:flex-row items-center gap-8 bg-white p-6 rounded-xl shadow-sm">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold mb-3">Naša Vízia</h2>
                    <p class="text-lg leading-relaxed">
                        Našou víziou je vytvoriť spoločnosť, kde sú všetci vítaní, rešpektovaní a majú možnosť naplno rozvíjať svoj potenciál bez ohľadu na ich schopnosti.
                    </p>
                </div>
                <img src="{{ asset('images/vision.jpg') }}" alt="Naša vízia" class="flex-1 rounded-lg shadow-sm object-cover h-60 w-full md:w-1/2">
            </section>

            {{-- OUR VALUES AND GOALS --}}
            <section class="flex flex-col md:flex-row-reverse items-center gap-8 bg-white p-6 rounded-xl shadow-sm">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold mb-3">Naše Hodnoty a Ciele</h2>
                    <p class="text-lg leading-relaxed">
                        Veríme v solidaritu, empatiu a spoluprácu. Naším cieľom je poskytovať programy, ktoré podporujú nezávislosť, zručnosti a sebadôveru našich členov.
                    </p>
                </div>
                <img src="{{ asset('images/values.jpg') }}" alt="Naše hodnoty a ciele" class="flex-1 rounded-lg shadow-sm object-cover h-60 w-full md:w-1/2">
            </section>

            {{-- OUR ACTIVITIES --}}
            <section class="flex flex-col md:flex-row items-center gap-8 bg-white p-6 rounded-xl shadow-sm">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold mb-3">Naše Aktivity</h2>
                    <p class="text-lg leading-relaxed">
                        Organizujeme vzdelávacie kurzy, tábory, kultúrne podujatia a komunitné stretnutia, ktoré podporujú začlenenie mladých ľudí s rôznymi schopnosťami.
                    </p>
                </div>
                <img src="{{ asset('images/activities.jpg') }}" alt="Naše aktivity" class="flex-1 rounded-lg shadow-sm object-cover h-60 w-full md:w-1/2">
            </section>

            {{-- OUR TEAM --}}
            <section class="bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-2xl font-semibold mb-6 text-center">Náš Tím</h2>

                <div class="space-y-8">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <img src="{{ asset('images/team1.jpg') }}" alt="Naša Mária" class="w-32 h-32 object-cover rounded-full shadow-sm">
                        <div>
                            <h3 class="text-xl font-semibold">Naša Mária</h3>
                            <p class="text-lg leading-relaxed">Mária vedie naše vzdelávacie programy a pomáha členom rozvíjať nové zručnosti s trpezlivosťou a úsmevom.</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row-reverse items-center gap-6">
                        <img src="{{ asset('images/team2.jpg') }}" alt="Naša Vedúca" class="w-32 h-32 object-cover rounded-full shadow-sm">
                        <div>
                            <h3 class="text-xl font-semibold">Naša Vedúca</h3>
                            <p class="text-lg leading-relaxed">Vedúca koordinuje naše projekty a zaisťuje, že všetky aktivity prebiehajú s ohľadom na potreby členov.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- HOME BUTTON --}}
            <div class="flex justify-center mt-10">
                <a href="{{ route('home') }}" class="flex items-center gap-2 bg-[#051647] text-white px-6 py-3 rounded-full hover:bg-blue-900 transition">
                    🏠 Domov
                </a>
            </div>

        </section>
    </main>

    {{-- JS for accessibility buttons --}}
    <script>
        function speakText() {
            const text = document.body.innerText;
            const speech = new SpeechSynthesisUtterance(text);
            speech.lang = 'sk-SK';
            window.speechSynthesis.speak(speech);
        }

        function sharePage() {
            if (navigator.share) {
                navigator.share({
                    title: 'O nás - Združenie VOTUM',
                    url: window.location.href
                });
            } else {
                alert('Zdieľanie nie je podporované vo vašom prehliadači.');
            }
        }
    </script>
@endsection
