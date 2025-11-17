<!-- Team Section -->
<div class="bg-blue-100 py-12 justify-center">
    <h2 class="h2 font-bold text-votum-blue mb-8 text-center py-5">Náš Tím</h2>

    <div class="grid lg:grid-cols-2 gap-8 mb-8 mx-5 sm:mx-10">

        @for($i = 0; $i < 4; $i++)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-votum1">
                <div class="flex flex-col sm:flex-row h-full">

                    <div class=" sm:w-1/2 m-3 flex justify-center items-center">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-cover bg-center"
                             style="
                                background-image: url('{{ asset('images/maria.png') }}');
                                -webkit-mask: url('{{ asset('images/badge.svg') }}') no-repeat center / contain;
                                mask: url('{{ asset('images/badge.svg') }}') no-repeat center / contain;
                             ">
                        </div>
                    </div>

                    <div class="p-6 sm:pl-0 flex flex-col justify-center sm:w-1/2">
                        <h3 class="h3 font-bold text-votum-blue mb-2">Mária Nováková</h3>
                        <p class="text-lg text-votum1 mb-4 font-semibold">Riaditeľka združenia</p>
                        <ul class="list-disc ps-4 text-votum-blue txt" >
                            <li>Zakladajúca členka VOTUM</li>
                            <li>Viac ako 10-ročné skúsenosti v oblasti sociálnej práce</li>
                        </ul>
                    </div>

                </div>
            </div>
        @endfor
    </div>

    <x-home />

</div>
