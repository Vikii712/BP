@props(['data', 'isSK', 'color'])

<div class="support-option-card border-4 {{$color ? 'border-votum3 bg-votum3' : 'border-votum2 bg-votum2'}} rounded-xl shadow-xl overflow-hidden">
    <div class="lg:grid lg:grid-cols-2 gap-0">

        <div class="{{$color ? 'bg-dark-votum3' : 'bg-dark-votum2'}}  p-4 sm:p-8 flex flex-col justify-center items-center text-white">
            <div class="icon-float">
                <i class="fas fa-house text-4xl lg:text-6xl"></i>
            </div>
            <h2 class="text-center h2 font-bold mb-2">{{ __('nav.address') }}</h2>
        </div>

        <div class="space-y-3  p-4 sm:p-8">
            @foreach($data as $address)
                <x-contacts.input name="{{$isSK ? $address->title_sk : $address->title_en}}" value="{{$isSK ? $address->content_sk : $address->content_en}}" color="{{$color ? 3 : 2}}"/>
            @endforeach
        </div>
    </div>
</div>
