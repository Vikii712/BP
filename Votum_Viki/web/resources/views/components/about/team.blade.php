<!-- Team Section -->
<div class="bg-blue-100 py-12">
    <h2 class="h2 font-bold text-votum-blue mb-8 text-center py-5">Náš Tím</h2>

    <div class="flex flex-col gap-8 mx-5 sm:mx-10">

        @foreach($team as $i => $member)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-votum1">

                @if($member['image'])
                    <div class="p-6 w-full">
                            <h3 class="h3 font-bold text-votum-blue mb-4">{{ $member['title'] }}</h3>
                            <div class="-top-10 relative">
                                <x-listen text="{{strip_tags($member['title'] . ' .' . $member['content']) }}" id="{{250 + $i }}" />
                            </div>

                        <img src="{{ asset('storage/' .$member['image']) }}" alt="{{ $member['title'] }}"
                             class="w-60 h-80 object-cover mb-4 sm:float-left sm:mr-6 sm:mb-4 mx-auto sm:mx-0 block">

                        <div class="text-lg text-votum1 [&>p]:mb-6 [&>ul]:mb-6 [&>ol]:mb-6 [&>h1]:mb-6 [&>h2]:mb-6 [&>h3]:mb-6 [&>h4]:mb-6">
                            {!! $member['content'] !!}
                        </div>

                        <div class="clear-both"></div>
                    </div>
                @else
                    <div class="p-6 flex flex-col">
                        <h3 class="h3 font-bold text-votum-blue mb-4">{{ $member['title'] }}</h3>
                        <div class="-top-10 relative">
                            <x-listen text="{{strip_tags($member['title'] . ' .' . $member['content']) }}" id="{{250 + $i }}" />
                        </div>
                        <div class="text-lg text-votum1 [&>p]:mb-6 [&>ul]:mb-6 [&>ol]:mb-6 [&>h1]:mb-6 [&>h2]:mb-6 [&>h3]:mb-6 [&>h4]:mb-6">
                            {!! $member['content'] !!}
                        </div>
                    </div>
                @endif

            </div>
        @endforeach

    </div>

    <x-home />
</div>
