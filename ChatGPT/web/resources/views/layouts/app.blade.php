<!doctype html>
<html lang="{{ $lang ?? 'sk' }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $t['site_name'] ?? 'VOTUM' }}</title>

    <!-- Tailwind via CDN for demo (replace with compiled Tailwind in production) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root{
            --votum-dark: #051647;
            --votum-cream: #f1ebe3;
        }
        /* accessible focus ring */
        .focus-ring:focus {
            outline: 3px solid #ffd54f;
            outline-offset: 2px;
        }
        body { background: var(--votum-cream); color: #0b2540; }
        header, footer { background: var(--votum-dark); color: white; }
        /* header icons spacing tweak */
    </style>

    <script>
        // font-size controller: attach to buttons with data-action
        function changeRootFontSize(delta){
            const root = document.documentElement;
            const current = parseFloat(getComputedStyle(root).getPropertyValue('font-size'));
            const next = Math.max(12, Math.min(20, current + delta));
            root.style.fontSize = next + 'px';
            localStorage.setItem('votum_root_font', next);
        }
        document.addEventListener('DOMContentLoaded', function(){
            const saved = localStorage.getItem('votum_root_font');
            if(saved) document.documentElement.style.fontSize = saved + 'px';
        });
    </script>
</head>
<body class="min-h-screen flex flex-col">
<a class="sr-only sr-only-focusable" href="#main">Skip to content</a>

<header class="w-full" role="banner" aria-label="Main header">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="/images/landing.png" alt="VOTUM logo" class="h-12 w-12 rounded-md" />
            <div>
                <h1 class="text-2xl font-bold" style="color: white;">{{ $t['site_name'] }}</h1>
                <p class="text-sm" style="color: #cbd7f1">Supporting people with disabilities</p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <button onclick="changeRootFontSize(1)" aria-label="{{ $t['font_inc'] }}" class="bg-white text-black px-3 py-1 rounded focus-ring">A+</button>
            <button onclick="changeRootFontSize(-1)" aria-label="{{ $t['font_dec'] }}" class="bg-white text-black px-3 py-1 rounded focus-ring">A-</button>

            <!-- Language toggle: adds ?lang=sk or ?lang=en while preserving other query params -->
            @php
                $query = request()->query();
                $other = request()->except('lang');
                $querySk = array_merge($other, ['lang' => 'sk']);
                $queryEn = array_merge($other, ['lang' => 'en']);
            @endphp

            <nav aria-label="Language switch">
                <a href="{{ url()->current() . '?' . http_build_query($querySk) }}" class="inline-flex items-center gap-1 px-3 py-1 rounded bg-white text-black focus-ring" aria-pressed="{{ $lang === 'sk' ? 'true' : 'false' }}">
                    SK
                </a>
                <a href="{{ url()->current() . '?' . http_build_query($queryEn) }}" class="ml-2 inline-flex items-center gap-1 px-3 py-1 rounded bg-white text-black focus-ring" aria-pressed="{{ $lang === 'en' ? 'true' : 'false' }}">
                    EN
                </a>
            </nav>
        </div>
    </div>

    <!-- second header row: nav with icons and labels -->
    <nav class="bg-white" role="navigation" aria-label="Primary">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-around sm:justify-start sm:gap-6">
            @php
                $menu = [
                    ['key'=>'home','label'=>$t['home'] , 'icon'=>'home'],
                    ['key'=>'about','label'=>$t['about'],'icon'=>'users'],
                    ['key'=>'events','label'=>$t['events'],'icon'=>'calendar'],
                    ['key'=>'history','label'=>$t['history'],'icon'=>'clock'],
                    ['key'=>'support','label'=>$t['support'],'icon'=>'heart'],
                    ['key'=>'contacts','label'=>$t['contacts'],'icon'=>'phone'],
                    ['key'=>'documents','label'=>$t['documents'],'icon'=>'docs'],
                ];
            @endphp

            @foreach($menu as $item)
                <a href="#{{ $item['key'] }}" class="flex-1 max-w-[110px] text-center p-2 rounded hover:bg-gray-100 focus-ring" aria-label="{{ $item['label'] }}">
                    <!-- simple inline SVG icons for clarity -->
                    @if($item['icon'] === 'home')
                        <svg class="mx-auto mb-1 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9.5L12 3l9 6.5M9 22V12h6v10"/></svg>
                    @elseif($item['icon'] === 'users')
                        <svg class="mx-auto mb-1 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2"/></svg>
                    @elseif($item['icon'] === 'calendar')
                        <svg class="mx-auto mb-1 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4"/></svg>
                    @elseif($item['icon'] === 'clock')
                        <svg class="mx-auto mb-1 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                    @elseif($item['icon'] === 'heart')
                        <svg class="mx-auto mb-1 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M20.8 4.6a5.5 5.5 0 00-7.8 0L12 5.6l-1-1a5.5 5.5 0 00-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 000-7.8z"/></svg>
                    @elseif($item['icon'] === 'phone')
                        <svg class="mx-auto mb-1 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M22 16.92V21a1 1 0 01-1.11 1A19 19 0 013 5.11 1 1 0 014 4h4.09a1 1 0 011 .75c.12.58.3 1.14.54 1.67a1 1 0 01-.23 1L8.6 9.9c1.8 3.71 5.1 7 8.8 8.8l.48-1.8a1 1 0 011-.23c.53.24 1.09.42 1.67.54a1 1 0 01.75 1V22z"/></svg>
                    @else
                        <svg class="mx-auto mb-1 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="14"/></svg>
                    @endif

                    <div class="text-xs">{{ $item['label'] }}</div>
                </a>
            @endforeach
        </div>
    </nav>
</header>

<main id="main" class="flex-1">
    @yield('content')
</main>

<footer class="mt-8 text-white">
    <div class="max-w-7xl mx-auto px-4 py-8 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div>
            <h3 class="text-lg font-bold">VOTUM</h3>
            <p class="text-sm max-w-md">We support people with disabilities. Inclusive activities, events, and community support.</p>
        </div>

        <div class="text-sm">
            <p>Contact: info@votum.example</p>
            <p>© {{ date('Y') }} VOTUM</p>
        </div>
    </div>
</footer>
</body>
</html>
