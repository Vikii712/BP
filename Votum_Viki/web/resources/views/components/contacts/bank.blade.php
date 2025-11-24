
<div class="support-option-card border-4 border-votum3 bg-votum3 rounded-xl shadow-xl overflow-hidden">
    <div class="lg:grid lg:grid-cols-2 gap-0">

        <div class="bg-dark-votum3  p-4 sm:p-8 flex flex-col justify-center items-center text-white">
            <div class="icon-float">
                <i class="fas fa-building-columns text-4xl lg:text-6xl"></i>
            </div>
            <h2 class="text-center h2 font-bold mb-2">Bankové údaje</h2>
        </div>

        <div class="space-y-3  p-4 sm:p-8">
            <x-contacts.input name="Číslo účtu" value="SK3112000000198765432100" :color="3"/>
            <x-contacts.input name="IBAN" value="SK3112000000198765432100" :color="3"/>
            <x-contacts.input name="SWIFT" value="SUBASKBXXXX" :color="3"/>
        </div>
    </div>
</div>
