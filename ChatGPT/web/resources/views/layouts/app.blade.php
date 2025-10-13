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

<header class="w-full text-white" x-data="{ mobileOpen: false }">
    @php
        // safe fallbacks if translations/lang not provided
        $lang = $lang ?? request()->query('lang', 'sk');
        $t = $t ?? [
            'font_inc'=>'Increase font', 'font_dec'=>'Decrease font',
            'home'=>'Home','about'=>'About us','events'=>'Events','history'=>'History',
            'support'=>'Support','contacts'=>'Contacts','documents'=>'Documents'
        ];

        // define menu with inline SVGs to avoid undefined variable issues
        $menu = [
            ['key'=>'home','label'=>$t['home'],'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9.5L12 3l9 6.5M9 22V12h6v10"/></svg>'],
            ['key'=>'about','label'=>$t['about'],'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2"/></svg>'],
            ['key'=>'events','label'=>$t['events'],'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4"/></svg>'],
            ['key'=>'history','label'=>$t['history'],'icon_svg' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>'],
            ['key'=>'support','label'=>$t['support'],'icon_svg' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 00-7.8 0L12 5.6l-1-1a5.5 5.5 0 00-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 000-7.8z"/></svg>'],
            ['key'=>'contacts','label'=>$t['contacts'],'icon_svg' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path d="M22 16.92V21a1 1 0 01-1.11 1A19 19 0 013 5.11 1 1 0 014 4h4.09a1 1 0 011 .75c.12.58.3 1.14.54 1.67a1 1 0 01-.23 1L8.6 9.9c1.8 3.71 5.1 7 8.8 8.8l.48-1.8a1 1 0 011-.23c.53.24 1.09.42 1.67.54a1 1 0 01.75 1V22z"/></svg>'],
            ['key'=>'documents','label'=>$t['documents'],'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="14"/></svg>'],
        ];

        // query links for language toggles
        $querySk = array_merge(request()->except('lang'), ['lang' => 'sk']);
        $queryEn = array_merge(request()->except('lang'), ['lang' => 'en']);
    @endphp

        <!-- Top Bar -->
    <div class="bg-[#051647]">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <!-- Logo + Name -->
            <div class="flex items-center gap-3">
                <img src="/images/landing.png" alt="VOTUM logo" class="h-10 w-10 rounded-md" />
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold">VOTUM</h1>
                    <p class="text-xs sm:text-sm text-gray-300">Supporting people with disabilities</p>
                </div>
            </div>

            <!-- Desktop Buttons -->
            <div class="hidden md:flex items-center gap-2">
                <div class="flex bg-[#0b2470] rounded-lg overflow-hidden">
                    <button onclick="changeRootFontSize(1)" aria-label="{{ $t['font_inc'] }}" class="px-3 py-1 hover:bg-[#112d8b] transition focus-ring">A+</button>
                    <button onclick="changeRootFontSize(-1)" aria-label="{{ $t['font_dec'] }}" class="px-3 py-1 hover:bg-[#112d8b] transition focus-ring">A-</button>
                </div>

                <div class="flex bg-[#0b2470] rounded-lg overflow-hidden">
                    <a href="{{ url()->current() . '?' . http_build_query($querySk) }}" class="px-3 py-1 hover:bg-[#112d8b] transition focus-ring {{ $lang === 'sk' ? 'bg-[#112d8b]' : '' }}">SK</a>
                    <a href="{{ url()->current() . '?' . http_build_query($queryEn) }}" class="px-3 py-1 hover:bg-[#112d8b] transition focus-ring {{ $lang === 'en' ? 'bg-[#112d8b]' : '' }}">EN</a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 rounded focus-ring hover:bg-[#0b2470]" aria-label="Menu" :aria-expanded="mobileOpen">
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <!-- Lower Nav (Desktop) -->
    <nav class="bg-[#0b2470] hidden md:block" role="navigation" aria-label="Primary">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-around sm:justify-start sm:gap-6">
            @foreach($menu as $item)
                <a href="#{{ $item['key'] }}" class="flex-1 max-w-[110px] text-center p-2 rounded hover:bg-[#112d8b] focus-ring transition" aria-label="{{ $item['label'] }}">
                    {!! $item['icon_svg'] !!}
                    <div class="text-xs">{{ $item['label'] }}</div>
                </a>
            @endforeach
        </div>
    </nav>

    <!-- Mobile Dropdown Menu -->
    <div x-show="mobileOpen" x-transition class="bg-[#0b2470] md:hidden text-white" @click.away="mobileOpen = false">
        <div class="px-4 py-3 flex justify-between items-center border-b border-[#132b6d]">
            <div class="flex items-center gap-3">
                <div class="flex bg-[#112d8b] rounded-lg overflow-hidden">
                    <button onclick="changeRootFontSize(1)" class="px-3 py-1 focus-ring">A+</button>
                    <button onclick="changeRootFontSize(-1)" class="px-3 py-1 focus-ring">A-</button>
                </div>
                <div class="flex bg-[#112d8b] rounded-lg overflow-hidden">
                    <a href="{{ url()->current() . '?' . http_build_query($querySk) }}" class="px-3 py-1 focus-ring {{ $lang === 'sk' ? 'bg-[#0b2470]' : '' }}">SK</a>
                    <a href="{{ url()->current() . '?' . http_build_query($queryEn) }}" class="px-3 py-1 focus-ring {{ $lang === 'en' ? 'bg-[#0b2470]' : '' }}">EN</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col divide-y divide-[#132b6d]">
            @foreach($menu as $item)
                <a href="#{{ $item['key'] }}" class="flex items-center gap-3 px-4 py-3 hover:bg-[#112d8b] focus-ring">
                    {!! $item['icon_svg'] !!}
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
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
