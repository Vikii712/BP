@php
    $navItems = [
        ['href' => '#home', 'icon' => 'domov.svg', 'label' => __('Home')],
        ['href' => '#about', 'icon' => 'Onas.svg', 'label' => __('About Us')],
        ['href' => '#events', 'icon' => 'udalosti.svg', 'label' => __('Events')],
        ['href' => '#history', 'icon' => 'historia.svg', 'label' => __('History')],
        ['href' => '#support', 'icon' => 'podpora.svg', 'label' => __('Support')],
        ['href' => '#contact', 'icon' => 'kontakty.svg', 'label' => __('Contact')],
        ['href' => '#documents', 'icon' => 'dokumenty.svg', 'label' => __('Documents')],
    ];
    $isMobile = $mobile ?? false;
@endphp

<ul class="{{ $isMobile ? 'space-y-2' : 'flex items-center justify-around py-4' }}">
    @foreach($navItems as $item)
        <li>
            <a
                href="{{ $item['href'] }}"
                class="flex {{ $isMobile ? 'items-center space-x-4 p-3 rounded-lg hover:bg-blue-900' : 'flex-col items-center space-y-2' }} text-white hover:text-votum-accent-light transition-colors group"
                onclick="{{ $isMobile ? 'toggleMobileMenu()' : '' }}">
                <img
                    src="{{ asset('images/' . $item['icon']) }}"
                    alt=""
                    class="w-7 h-7 object-contain {{ $isMobile ? '' : 'mb-1' }} transition-all">
                <span class="text-sm font-medium">{{ $item['label'] }}</span>
            </a>
        </li>
    @endforeach
</ul>
