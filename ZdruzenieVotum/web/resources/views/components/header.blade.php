<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="container flex flex-col md:flex-row md:items-center md:justify-between py-3 gap-3">
        <div class="flex items-center gap-3">
            <img src="/images/logo-placeholder.svg" alt="VOTUM logo" class="w-12 h-12" />
            <div>
                <h1 class="text-2xl font-semibold">VOTUM</h1>
                <p class="text-sm text-slate-500">Spolu je život veselší</p>
            </div>
        </div>

        <div class="flex items-center gap-3 ml-auto">
            <div class="flex items-center gap-1">
                <button id="decrease-font" class="p-2 border rounded">A-</button>
                <button id="increase-font" class="p-2 border rounded">A+</button>
            </div>
            <form action="{{ route('set-locale') }}" method="post" class="flex items-center gap-2">
                @csrf
                <label><input type="radio" name="locale" value="sk" onchange="this.form.submit()" {{ session('locale','sk')==='sk'?'checked':'' }}> SK</label>
                <label><input type="radio" name="locale" value="en" onchange="this.form.submit()" {{ session('locale')==='en'?'checked':'' }}> EN</label>
            </form>
        </div>
    </div>

    <x-nav />
</header>

@push('scripts')
    <script>
        (function () {
            const html = document.documentElement;
            const inc = document.getElementById('increase-font');
            const dec = document.getElementById('decrease-font');
            function getSize(){return parseFloat(localStorage.getItem('font')||1);}
            function apply(){html.style.fontSize=getSize()+'rem';}
            inc.addEventListener('click',()=>{let s=getSize(); if(s<1.5){s=+(s+0.05).toFixed(2);localStorage.setItem('font',s);apply();}});
            dec.addEventListener('click',()=>{let s=getSize(); if(s>0.8){s=+(s-0.05).toFixed(2);localStorage.setItem('font',s);apply();}});
            apply();
        })();
    </script>
@endpush
