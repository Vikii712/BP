@props(['data', 'isSK', 'color'])

<div class="support-option-card border-4 {{$color ? 'border-votum3 bg-votum3' : 'border-votum2 bg-votum2'}} rounded-xl shadow-xl overflow-hidden">
    <div class="lg:grid lg:grid-cols-2 gap-0">

        <div class="{{$color ? 'bg-dark-votum3' : 'bg-dark-votum2'}} p-4 sm:p-8 flex flex-col justify-center items-center text-white">
            <div class="icon-float">
                <i class="fas fa-envelope text-4xl lg:text-6xl"></i>
            </div>
            <h2 class="text-center h2 font-bold mb-2">{{ __('nav.email') }}</h2>
        </div>

        <div class="space-y-3 p-4 sm:p-8">
            @foreach($data as $mail)
                <x-contacts.input name="{{$isSK ? $mail->title_sk : $mail->title_en}}" value="{{$isSK ? $mail->content_sk : $mail->content_en}}" color="{{$color ? 3 : 2}}"/>
                <button onclick="window.location.href='mailto:{{$isSK ? $mail->content_sk : $mail->content_en}}'" class="w-full bg-votum-blue text-white py-2 px-4 rounded txt-btn">
                    <i class="fas fa-paper-plane mr-2"></i>{{ __('nav.write') }}
                </button>
            @endforeach
        </div>
    </div>
</div>
