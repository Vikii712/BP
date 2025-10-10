<div class="flex items-center space-x-2 bg-blue-900 rounded-lg p-2">
    <label class="flex items-center cursor-pointer">
        <input
            type="radio"
            name="language"
            value="sk"
            class="sr-only"
            {{ app()->getLocale() == 'sk' ? 'checked' : '' }}
            onchange="changeLanguage('sk')">
        <span class="px-3 py-1 rounded transition-colors {{ app()->getLocale() == 'sk' ? 'bg-votum-accent text-white' : 'bg-votum-blue text-white hover:bg-blue-800' }}">SK</span>
    </label>
    <label class="flex items-center cursor-pointer">
        <input
            type="radio"
            name="language"
            value="en"
            class="sr-only"
            {{ app()->getLocale() == 'en' ? 'checked' : '' }}
            onchange="changeLanguage('en')">
        <span class="px-3 py-1 rounded transition-colors {{ app()->getLocale() == 'en' ? 'bg-votum-accent text-white' : 'bg-votum-blue text-white hover:bg-blue-800' }}">EN</span>
    </label>
</div>
