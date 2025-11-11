<div class=" grid md:grid-cols-2">

    <div class="hidden md:flex items-center justify-center">
        <div class="text-votum-blue flex items-center justify-center">
            <i class="fas fa-id-card text-6xl"></i>
        </div>
    </div>

    <div class="border-4 border-votum3 bg-votum3 p-6 rounded-lg shadow-lg mb-5">
        <div class="flex items-start gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-votum-blue text-white p-4 rounded-full flex-shrink-0 flex md:hidden items-center justify-center">
                        <i class="fas fa-id-card text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-votum-blue">Identifikačné údaje:</h3>
                </div>

                <div class="space-y-3">
                    <x-contacts.input name="IČO" value="12345678" :color="3"/>
                    <x-contacts.input name="DIČ" value="2023456789" :color="3"/>
                </div>
            </div>
        </div>
    </div>

</div>
