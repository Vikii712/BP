
<div class="support-option-card border-4 border-votum2 bg-votum2 rounded-xl shadow-xl overflow-hidden">
    <div class="lg:grid lg:grid-cols-2 gap-0">

        <div class="bg-dark-votum2  p-4 sm:p-8 flex flex-col justify-center items-center text-white">
            <div class="icon-float">
                <i class="fas fa-envelope text-4xl lg:text-6xl"></i>
            </div>
            <h2 class="text-center h2 font-bold mb-2">Mailové spojenie</h2>
        </div>

        <div class="space-y-3  p-4 sm:p-8">
            <x-contacts.input name="Združenie VOTUM" value="zdruzenie.votum@gmail.com" :color="2"/>
            <button onclick="window.location.href='mailto:zdruzenie.votum@gmail.com'" class="w-full bg-votum-blue text-white py-2 px-4 rounded txt-btn">
                <i class="fas fa-paper-plane mr-2"></i>Napísať
            </button>

            <x-contacts.input name="Admin" value="admin@zdruzenie.votum.sk" :color="2"/>
            <button onclick="window.location.href='mailto:admin@zdruzenie.votum.sk'" class="w-full bg-votum-blue text-white py-2 px-4 rounded txt-btn">
                <i class="fas fa-paper-plane mr-2"></i>Napísať
            </button>
        </div>
    </div>
</div>
