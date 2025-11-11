<div class=" grid md:grid-cols-2">

    <div class="hidden md:flex items-center justify-center">
        <div class="bg-votum-blue text-white rounded-full flex items-center justify-center w-28 h-28 shadow-lg">
            <i class="fas fa-envelope text-4xl"></i>
        </div>
    </div>

    <div class="border-4 border-votum bg-other-cream my-5 p-6 rounded-lg">
        <div class="flex items-start gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-votum-blue text-white p-4 rounded-full flex-shrink-0 flex md:hidden items-center justify-center">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-votum-blue">Mailové spojenie:</h3>
                </div>

                <div class="space-y-3">
                    <x-contacts.input name="Združenie VOTUM" value="zdruzenie.votum@gmail.com" />
                    <button onclick="window.location.href='mailto:zdruzenie.votum@gmail.com'" class="w-full bg-votum-blue text-white py-2 px-4 rounded hover-scale">
                        <i class="fas fa-paper-plane mr-2"></i>Napísať
                    </button>

                    <x-contacts.input name="Admin" value="admin@zdruzenie.votum.sk" />
                    <button onclick="window.location.href='mailto:admin@zdruzenie.votum.sk'" class="w-full bg-votum-blue text-white py-2 px-4 rounded hover-scale">
                        <i class="fas fa-paper-plane mr-2"></i>Napísať
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
