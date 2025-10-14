@extends('layouts.app')

@section('content')
    <main class="bg-[#f1ebe3] min-h-screen text-[#051647]">
        <section class="max-w-5xl mx-auto px-6 py-12 space-y-10">

            {{-- Title --}}
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-2">Kontakt</h1>
                <p class="text-xl font-medium">OZVITE SA NÁM!</p>
            </div>

            {{-- Phone --}}
            <div class="bg-white p-6 rounded-xl shadow-sm flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-[#051647]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                                   d="M2.25 6.75C2.25 4.68 3.93 3 6 3h1.5c.83 0 1.58.34 2.12.88l2.25 2.25a1.5 1.5 0 01.44 1.06v2.07a1.5 1.5 0 01-.44 1.06l-.9.9a13.5 13.5 0 006.36 6.36l.9-.9a1.5 1.5 0 011.06-.44h2.07a1.5 1.5 0 011.06.44l2.25 2.25c.54.54.88 1.29.88 2.12V18c0 2.07-1.68 3.75-3.75 3.75C8.82 21.75 2.25 15.18 2.25 6.75z"/></svg>
                    <div>
                        <div class="font-semibold">Telefónne číslo</div>
                        <div class="text-lg font-bold">0587 654 321</div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="tel:0587654321" class="bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">📞 Volať</a>
                    <button onclick="navigator.clipboard.writeText('0587654321')" class="border border-[#051647] px-4 py-2 rounded-lg hover:bg-[#051647] hover:text-white transition">📋 Kopírovať</button>
                </div>
            </div>

            {{-- Address --}}
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-xl font-semibold mb-3">Adresa</h2>
                <p><strong>Sídlo:</strong> Hlavná 123, Bratislava</p>
                <p><strong>Činnosť:</strong> Podpora ľudí so zdravotným znevýhodnením</p>
            </div>

            {{-- Email --}}
            <div class="bg-white p-6 rounded-xl shadow-sm space-y-4">
                <h2 class="text-xl font-semibold">Mailové spojenie</h2>

                <div class="flex flex-col sm:flex-row justify-between items-center border-b pb-3">
                    <div>
                        <p><strong>VOTUM:</strong> zdruzenie.votum@gmail.com</p>
                    </div>
                    <a href="mailto:zdruzenie.votum@gmail.com" class="bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition mt-2 sm:mt-0">✉️ Napísať</a>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <div>
                        <p><strong>Admin:</strong> admin@zdruzenievotum.sk</p>
                    </div>
                    <a href="mailto:admin@zdruzenievotum.sk" class="bg-[#051647] text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition mt-2 sm:mt-0">✉️ Napísať</a>
                </div>
            </div>

            {{-- Identification Data --}}
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-xl font-semibold mb-3">Identifikačné údaje</h2>
                <p><strong>IČO:</strong> 12345678</p>
                <p><strong>DIČ:</strong> 987654321</p>
            </div>

            {{-- Bank Details --}}
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-xl font-semibold mb-3">Bankové údaje</h2>
                <p><strong>Číslo účtu:</strong> SK12 3456 7890 1234 5678 9012</p>
                <p><strong>IBAN:</strong> SK12 3456 7890 1234 5678 9012</p>
                <p><strong>SWIFT:</strong> KBSPSK2X</p>
            </div>

        </section>
    </main>
@endsection
