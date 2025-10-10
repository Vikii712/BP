<div class="flex items-center space-x-2 bg-blue-50 rounded-lg p-2" role="group" aria-label="{{ __('Font size controls') }}">
    <button
        onclick="decreaseFontSize()"
        class="px-3 py-1 bg-white rounded hover:bg-blue-100 transition-colors"
        aria-label="{{ __('Decrease font size') }}">
        <i class="fas fa-minus text-sm"></i>
    </button>
    <span class="text-sm font-medium text-gray-700">{{ __('Font') }}</span>
    <button
        onclick="increaseFontSize()"
        class="px-3 py-1 bg-white rounded hover:bg-blue-100 transition-colors"
        aria-label="{{ __('Increase font size') }}">
        <i class="fas fa-plus text-sm"></i>
    </button>
</div>
