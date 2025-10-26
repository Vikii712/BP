{{-- resources/views/components/locale-switch.blade.php --}}
@props(['mobile' => false])

<form action="{{ route('setLocale') }}" method="post"
      class="flex items-center gap-1 bg-blue-900 rounded-full px-3 py-1 {{ $mobile ? 'locale-form-mobile' : '' }}"
      @if($mobile) data-mobile="true" @endif>
    @csrf
    <button type="submit" name="locale" value="sk"
            class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                {{ session('locale','sk')==='sk' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
        SK
    </button>
    <button type="submit" name="locale" value="en"
            class="flex items-center gap-1 text-sm font-medium rounded-full px-2 py-1 transition
                {{ session('locale')==='en' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
        EN
    </button>
</form>
