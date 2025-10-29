<!-- Team Section -->
<div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-votum-blue mb-8 text-center">Náš Tím</h2>

    <div class="grid md:grid-cols-2 gap-8 mb-8">

       @for($i = 0; $i < 4; $i++)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 flex gap-4">
                    <div class="w-64 h-64 bg-cover bg-center"
                         style="
                            background-image: url('{{ asset('images/maria.png') }}');
                            -webkit-mask: url('{{ asset('images/badge.svg') }}') no-repeat center / contain;
                            mask: url('{{ asset('images/badge.svg') }}') no-repeat center / contain;
                     ">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-3xl font-bold text-votum-blue mb-2">Mária Nováková</h3>
                        <p class="text-xl text-gray-600 mb-4 font-semibold">Riaditeľka združenia</p>
                        <p class="text-gray-700 text-md">
                            Zakladajúca členka VOTUM s viac ako 15-ročnými zkúsenosťami v oblasti sociálnej práce a podpory ľudí so zdravotným znevýhodnením.
                        </p>
                    </div>
                </div>
            </div>
        @endfor

    </div>
</div>
