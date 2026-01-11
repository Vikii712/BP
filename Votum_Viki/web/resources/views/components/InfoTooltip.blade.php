@php
    $messages = [
        'alt' => 'Alternatívny text sa používa pre ľudí so zrakovým postihnutím alebo keď sa obrázok nezobrazí. Mal by stručne popísať obsah obrázka.',
    ];
@endphp

@props(['typ'])

<div class="relative flex items-center gap-2">
    <span class="text-blue-950 font-semibold cursor-pointer info-icon">ℹ️</span>
    <div class="absolute z-10 w-64 bg-blue-50 border border-blue-300 text-blue-950 px-3 py-2 rounded-md shadow-lg hidden info-message">
        {{ $messages[$typ] ?? '' }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.info-icon').forEach(function(icon) {
            const messageBox = icon.parentElement.querySelector('.info-message');

            icon.addEventListener('mouseenter', function() {
                messageBox.classList.remove('hidden');
            });
            icon.addEventListener('mouseleave', function() {
                messageBox.classList.add('hidden');
            });
        });
    });
</script>
