@props(['mobile' => false])

@php
    $currentLocale = app()->getLocale();
    $routeName = request()->route()?->getName();
    $params = request()->route()?->parameters() ?? [];

    $skUrl = $routeName
        ? route($routeName, array_merge($params, ['locale' => 'sk']))
        : url('/sk');

    $enUrl = $routeName
        ? route($routeName, array_merge($params, ['locale' => 'en']))
        : url('/en');
@endphp

<div
    class="flex items-center gap-1 border-2 border-blue-100 bg-blue-100 rounded-full {{ $mobile ? 'locale-form-mobile' : '' }}"
    @if($mobile) data-mobile="true" @endif
>
    <a href="{{ $skUrl }}"
       hreflang="sk"
       class="txt-btn-block flex items-center gap-1 text-lg font-medium rounded-full {{ $mobile ? 'py-3' : 'py-2' }} px-5 transition
           {{ $currentLocale === 'sk' ? 'bg-blue-300 border-2 border-votum1' : '' }} text-votum-blue">
        SK
    </a>

    <a href="{{ $enUrl }}"
       hreflang="en"
       class="txt-btn-block flex items-center gap-1 text-lg font-medium rounded-full px-5 {{ $mobile ? 'py-3' : 'py-2' }} transition
           {{ $currentLocale === 'en' ? 'bg-blue-300 border-2 border-votum1' : '' }} text-votum-blue">
        EN
    </a>
</div>
