<div class="support-option-card border-4 border-votum3 bg-votum3 rounded-xl shadow-xl overflow-hidden">
    <div class="lg:grid lg:grid-cols-2 gap-0">

        <div class="bg-dark-votum3 p-8 flex flex-col justify-center items-center text-white">
            <div class="icon-float mb-6">
                <i class="fas fa-phone-volume text-6xl"></i>
            </div>
            <h2 class="text-center h2 font-bold mb-2">Telefónne číslo</h2>
        </div>

        <div class="space-y-3 p-8">
            <x-contacts.input name="Združenie VOTUM" value="0827654329" :color="3"/>
            <div class="flex gap-2">
                <a href="tel:0827654329" class="flex-1 bg-votum-blue text-white py-2 px-4 rounded text-center hover-scale">
                    <i class="fas fa-phone mr-2"></i>Volať
                </a>
                <a href="sms:0827654329" class="flex-1 bg-dark-votum3 text-white py-2 px-4 rounded text-center hover-scale">
                    <i class="fas fa-sms mr-2"></i>SMS
                </a>
            </div>
        </div>
    </div>
</div>
