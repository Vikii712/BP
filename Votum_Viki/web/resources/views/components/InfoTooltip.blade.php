@php
    $messages = [
        'alt' => 'Alternatívny text čitajú čítačky pre ľudí so zrakovým znevýhodnením, alebo je vypísaný keď sa obrázok nezobrazí. Mal by stručne popísať obsah obrázka.',
        'hero' => 'Úvodný text je prvým viditeľným textom pri načítaní hlavnej stránky. Mal by mať rozsah asi 1-2 vety.',
        'motto' => 'Motto je prvá zvýraznená veta, ktorú uvidí používateľ pri navštívení hlavnej stránky.',
    ];
@endphp

@props(['typ'])

<div class="relative flex items-center gap-2">
    <span class="text-blue-950 text-2xl font-bold cursor-pointer info-icon px-2">
        <i class="fas fa-question-circle"></i>
    </span>
    <div class="absolute z-10 w-64 bg-blue-50 border border-blue-300 text-blue-950 px-4 py-3 rounded-md shadow-lg hidden info-message"
         style="left: 2rem; top: 50%; transform: translateY(-50%);">
        {{ $messages[$typ] ?? '' }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.info-icon').forEach(function(icon) {
            const msg = icon.parentElement.querySelector('.info-message');
            icon.addEventListener('mouseenter', () => msg.classList.remove('hidden'));
            icon.addEventListener('mouseleave', () => msg.classList.add('hidden'));
        });
    });
</script>
