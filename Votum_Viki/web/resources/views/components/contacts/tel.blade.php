<div class=" grid md:grid-cols-2">

    <div class="border-4 border-votum1 bg-blue-100 mb-5 p-6 rounded-lg">
        <div class="flex items-start gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-votum-blue text-white p-4 rounded-full flex-shrink-0 flex md:hidden items-center justify-center">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-votum-blue">Telefónne číslo:</h3>
                </div>

                <div class="space-y-2">
                    <x-contacts.input name="Združenie VOTUM" value="0827654329" :color="1"/>
                    <div class="flex gap-2">
                        <a href="tel:0827654329" class="flex-1 bg-votum-blue text-white py-2 px-4 rounded text-center hover-scale">
                            <i class="fas fa-phone mr-2"></i>Volať
                        </a>
                        <a href="sms:0827654329" class="flex-1 bg-green-600 text-white py-2 px-4 rounded text-center hover-scale">
                            <i class="fas fa-sms mr-2"></i>SMS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden md:flex items-center justify-center">
        <div class="text-votum-blue flex items-center justify-center">
            <i class="fas fa-phone text-6xl"></i>
        </div>
    </div>


</div>
