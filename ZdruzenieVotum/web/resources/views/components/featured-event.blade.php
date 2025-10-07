<div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col h-full border border-blue-100">
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-56 object-cover">
    <div class="p-6 flex flex-col justify-between flex-grow text-left">
        <div>
            <h4 class="font-semibold text-xl text-blue-950 mb-2">{{ $title }}</h4>
            <p class="text-sm text-slate-700 leading-relaxed">{{ $excerpt }}</p>
        </div>
        <a href="#"
           class="mt-6 inline-block self-start bg-blue-300 text-blue-950 font-medium px-5 py-2 rounded-full shadow hover:bg-blue-400 transition">
            Viac
        </a>
    </div>
</div>
