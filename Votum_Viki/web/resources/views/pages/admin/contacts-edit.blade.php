@extends('layouts.admin')

@section('adminContent')
    <div class="min-h-[calc(100vh-5.5rem)] pt-20 bg-gray-100 px-4 py-10">
        <div class="max-w-6xl mx-auto space-y-10">

            <h1 class="text-3xl font-bold text-blue-950 text-center">
                Úprava kontaktov
            </h1>

            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-100 border border-green-400 text-green-900 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Renderovanie každej sekcie cez komponent --}}
            @foreach ($sections as $sectionKey => $sectionItems)
                <x-admin.contact-section
                    :category="$sectionKey"
                    :sections="$sectionItems" />
            @endforeach

        </div>
    </div>

    <script>

        function addSection(category) {
            const container = document.querySelector(`form[action*='${category}']`);
            if (!container) return;

            // zisti počet existujúcich sekcií
            const sections = container.querySelectorAll('.bg-white.border');
            const index = sections.length;

            // vytvor nový HTML blok (zjednodušená verzia)
            const newSection = document.createElement('div');
            newSection.className = 'bg-white border border-gray-200 rounded-md p-4 shadow-sm space-y-4';
            newSection.innerHTML = '';

}

        function markForDelete(btn) {
            const section = btn.closest('.bg-white');
            section.querySelector('input[name$="[_delete]"]').value = 1;
            section.style.display = 'none';
        }

    </script>
@endsection
