<div class="border-4 border-votum1 p-6 bg-blue-100 rounded-lg grid lg:grid-cols-2 gap-3">

    <div class="space-y-3 mb-5 md:mb-0">
        <div class="flex items-center gap-3 mb-8">
            <div class="bg-votum-blue text-white p-4 rounded-full flex-shrink-0 flex items-center justify-center">
                <i class="fas fa-home text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-votum-blue">Adresa:</h3>
        </div>
            <x-contacts.input name="Sídlo" value="Hlavná 123, 811 01 Bratislava" :color="1"/>
            <x-contacts.input name="Prevádzka" value="Komunitná 45, 811 05 Bratislava" :color="1"/>
    </div>


    <div class="p-2 rounded-lg ">
        <div class="aspect-video rounded-lg overflow-hidden border-4 border-votum1">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d74379.93769583365!2d17.046664584678727!3d48.17723803177438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476cf311fce4fa51%3A0x5b97747d4876db6e!2sZDRU%C5%BDENIE%20VOTUM!5e0!3m2!1ssk!2ssk!4v1762343714118!5m2!1ssk!2ssk"
                class="w-full h-full"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

</div>
