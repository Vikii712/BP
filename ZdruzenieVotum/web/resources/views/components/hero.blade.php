<section id="hero" class="w-full bg-[#f1ebe3] text-gray-900 pt-[var(--header-height)] relative overflow-hidden">
    <div class="flex flex-col md:grid md:grid-cols-2 gap-10 items-center px-6 md:px-12 pb-16 relative z-10">

        <!-- Text (appears first on all screens) -->
        <div class="max-w-lg order-1 relative z-20">
            <h2 class="text-4xl md:text-5xl font-extrabold leading-tight text-blue-950">
                Life is more joyful <span class="text-blue-800">together</span>
            </h2>
            <p class="mt-6 text-lg text-gray-700">
                We support people with disabilities with joy and inclusion.
            </p>

            <div class="mt-8 flex gap-4 flex-wrap">
                <a href="#about"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded-lg shadow transition">
                    More about us
                </a>

                <!-- Social icons -->
                <div class="flex gap-3">
                    <a href="https://facebook.com" aria-label="Facebook"
                       class="p-3 border border-blue-500 text-blue-700 hover:bg-blue-100 rounded-full transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current"
                             viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0 0 22 12z" />
                        </svg>
                    </a>

                    <a href="https://youtube.com" aria-label="YouTube"
                       class="p-3 border border-blue-500 text-blue-700 hover:bg-blue-100 rounded-full transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current"
                             viewBox="0 0 24 24">
                            <path
                                d="M23.5 6.2s-.2-1.6-.9-2.3c-.9-.9-1.9-.9-2.4-1C17.4 2.5 12 2.5 12 2.5h-.1s-5.4 0-8.1.4c-.5.1-1.5.1-2.4 1-.7.7-.9 2.3-.9 2.3S0 7.8 0 9.5v1.9c0 1.7.2 3.3.2 3.3s.2 1.6.9 2.3c.9.9 2.1.9 2.6 1 1.9.2 8 .4 8 .4s5.4 0 8.1-.4c.5-.1 1.5-.1 2.4-1 .7-.7.9-2.3.9-2.3s.2-1.6.2-3.3V9.5c0-1.7-.2-3.3-.2-3.3zM9.6 14.5V8.6l6.4 3-6.4 2.9z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Image -->
        <div class="order-2 flex justify-center md:justify-end relative z-10 mt-8 md:mt-0">
            <img src="{{ asset('images/group.jpg') }}"
                 alt="Group of young people smiling"
                 class="rounded-xl shadow-2xl w-full max-w-md md:max-w-lg relative z-10">
        </div>

        <!-- Illustration (floats between text & photo, adjusts on screen size) -->
        <img src="{{ asset('images/logo.png') }}"
             alt="Illustration of two figures"
             class="absolute top-[55%] left-1/2 -translate-x-1/2 -translate-y-1/2 w-40 sm:w-52 md:w-64 lg:w-72 opacity-95 z-0 pointer-events-none select-none transition-all duration-300">
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const header = document.querySelector("header");
            const hero = document.getElementById("hero");

            function adjustHeroMargin() {
                hero.style.paddingTop = header.offsetHeight + 50 + "px";
            }

            adjustHeroMargin();
            window.addEventListener("resize", adjustHeroMargin);
            const observer = new MutationObserver(adjustHeroMargin);
            observer.observe(document.documentElement, { attributes: true, attributeFilter: ["style"] });
        });
    </script>
@endpush
