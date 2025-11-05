<div class="grid md:grid-cols-2">

    <div class="bg-other-cream p-6 rounded-lg shadow-lg">
        <div class="flex items-start gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-votum-blue text-white p-4 rounded-full flex-shrink-0 flex md:hidden items-center justify-center">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-votum-blue">Bankové údaje:</h3>
                </div>
                <div class="space-y-3">
                    <x-contacts.input name="Číslo účtu" value="SK3112000000198765432100" />
                    <x-contacts.input name="IBAN" value="SK3112000000198765432100" />
                    <x-contacts.input name="SWIFT" value="SUBASKBXXXX" />
                </div>
            </div>
        </div>
    </div>

    <div class="hidden md:flex items-center justify-center">
        <div class="bg-votum-blue text-white rounded-full flex items-center justify-center w-28 h-28 shadow-lg">
            <i class="fas fa-university text-4xl"></i>
        </div>
    </div>

</div>
