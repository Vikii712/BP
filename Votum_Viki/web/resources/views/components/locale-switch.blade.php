{{-- resources/views/components/locale-switch.blade.php --}}
@props(['mobile' => false])

<form action="{{ route('setLocale') }}" method="post"
      class="flex items-center gap-1 border-2 border-blue-100 bg-blue-100 rounded-full {{ $mobile ? 'locale-form-mobile' : '' }}"
      @if($mobile) data-mobile="true" @endif>
    @csrf
    <button type="submit" name="locale" value="sk"
            class="flex items-center gap-1 text-lg font-medium rounded-full {{$mobile ? 'py-3' : 'py-2'}} px-5 transition
                {{ session('locale','sk')==='sk' ? 'bg-blue-300 border-2 border-votum1'  : '' }} text-votum-blue">
        SK
    </button>
    <button type="submit" name="locale" value="en"
            class="flex items-center gap-1 text-lg font-medium rounded-full px-5 {{$mobile ? 'py-3' : 'py-2'}} transition
                {{ session('locale')==='en' ? 'bg-blue-300 border-2 border-votum1'  : '' }} text-votum-blue">
        EN
    </button>
</form>
