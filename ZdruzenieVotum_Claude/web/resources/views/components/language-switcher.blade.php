<div class="flex items-center space-x-2 bg-blue-50 rounded-lg p-2">
    <label class="flex items-center cursor-pointer">
        <input
            type="radio"
            name="language"
            value="sk"
            class="sr-only"
            {{ app()->getLocale() == 'sk' ? 'checked' : '' }}
            onchange="changeLanguage('sk')">
        <span class="px-3 py-1 rounded transition-colors {{ app()->getLocale() == 'sk' ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-blue-100' }}">SK</span>
    </label>
    <label class="flex items-center cursor-pointer">
        <input
            type="radio"
            name="language"
            value="en"
            class="sr-only"
            {{ app()->getLocale() == 'en' ? 'checked' : '' }}
            onchange="changeLanguage('en')">
        <span class="px-3 py-1 rounded transition-colors {{ app()->getLocale() == 'en' ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-blue-100' }}">EN</span>
    </label>
</div>
