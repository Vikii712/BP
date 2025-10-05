<article class="bg-white p-4 rounded shadow-sm flex justify-between items-start">
    <div>
        <h4 class="font-semibold">{{ $date }} — {{ $title }}</h4>
        <p class="text-sm text-slate-600 mt-1">{{ $description }}</p>
    </div>
    <div class="flex flex-col gap-2">
        <button class="px-3 py-1 text-sm border rounded">Share</button>
        <a href="#" class="px-3 py-1 text-sm bg-[var(--accent)] rounded">More</a>
    </div>
</article>
