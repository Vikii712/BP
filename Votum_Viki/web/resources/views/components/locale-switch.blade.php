{{-- resources/views/components/locale-switch.blade.php --}}
@props(['mobile' => false])

<form action="{{ route('setLocale') }}" method="post"
      class="flex items-center gap-1 bg-blue-900 rounded-full {{ $mobile ? 'locale-form-mobile' : '' }}"
      @if($mobile) data-mobile="true" @endif>
    @csrf
    <button type="submit" name="locale" value="sk"
            class="flex items-center gap-1 text-lg font-medium rounded-full {{$mobile ? 'py-3' : 'py-2'}} px-5 transition
                {{ session('locale','sk')==='sk' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
        SK
    </button>
    <button type="submit" name="locale" value="en"
            class="flex items-center gap-1 text-lg font-medium rounded-full px-5 {{$mobile ? 'py-3' : 'py-2'}} transition
                {{ session('locale')==='en' ? 'bg-blue-300 text-blue-900' : 'text-[var(--cream)]' }}">
        EN
    </button>
</form>
